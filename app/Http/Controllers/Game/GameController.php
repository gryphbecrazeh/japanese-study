<?php

namespace App\Http\Controllers\Game;

use App\Models\Game as GModel;
use App\Game\Game;
use App\Models\Verb;
use App\Models\Level;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class GameController extends Controller
{
    public $game;
    public function __construct()
    {
    }
    //
    public function index(Game $game)
    {
        $this->game = $game;
        $message = [
            'type'=>null,
            'value'=>null
        ];



        return view('app', ['message'=>$message]);
    }
    //
    public function store(Request $request)
    {
        $message = [
            'type'=>null,
            'value'=>null
        ];
        
        $level = app(Game::class);
        $level->loadGame();

        $levelDictionary = collect(unserialize($level->dictionary));
        $learnedWords = auth()->user()->learnedWords()->whereIn('verb_id', $levelDictionary)->get();
        $targetWord = Verb::where('id', '=', $level->targetWord)->limit(1)->get()->first();
        $knownWords = $learnedWords->filter(function ($word) {
            return $word->shouldKnow;
        });
        // Figure out how to get URL and supply filterable parameters ie: word type, hasLearned, verb/noun/adjective
        // you're stupid, this controller is already on a route, just make them extend a base one or something


        if ($level->inputMode == 'kana' && !is_null($request->input('kana'))) {
            if ($request->input('kana') == $targetWord->politeForm) {
                $level->setUserInput('kana', $request->input('kana'));
                $level->setInputMode('meanings');
                $level->saveGame();
                $message=$level->getCorrectKanaMessage($targetWord);
            } else {
                $message=$level->getWrongKanaMessage($targetWord);
            }
            // Return back a message saying what the issue is
            return view('app', ['message'=>$message]);
        }

        if ($level->inputMode == 'meanings' && !is_null($request->input('meanings'))) {
            $level->setUserInput('meanings', $request->input('meanings'));
            $applicableMeanings = unserialize($targetWord->meanings);
            /**
             *
             * Check if correct, and score
             *
             */
            $meanings = preg_replace('/^\s*to\ +/i', '', $request->input('meanings'));

            preg_match_all('/[\w\s]+(?=\,?\s?)/', $meanings, $answers);

            $answers = collect($answers)->first();
            $correctAnswers = 0;
      

            foreach ($answers as  $answer) {
                if (collect($applicableMeanings)->contains(function ($value, $key) use ($answer) {
                    return $answer == $value;
                })) {
                    $applicableMeanings = collect($applicableMeanings)->filter(function ($meaning) use ($answer) {
                        return $meaning != $answer;
                    });
                    $correctAnswers++;
                }
            }
            // Can I abuse this by repeatedly refreshing and resubmitting the request? maybe not if I were actually finishing this
            if ($correctAnswers > 0) {
                $targetWord->increaseTimesRight();
                auth()->user()->learnedWords()->where('verb_id', '=', $targetWord->id)->get()->first()->increaseTimesRight();
                $level->increaseScore($correctAnswers);
                $level->increaseStreak();
                $message = $level->getCorrectMeaningMessage($targetWord);
            } else {
                $targetWord->increaseTimesWrong();
                auth()->user()->learnedWords()->where('verb_id', '=', $targetWord->id)->get()->first()->increaseTimesWrong();
                $level->resetScore();
                $level->resetStreak();
                $message = $level->getWrongMeaningMessage($targetWord);
            }
    
   
    
            // debug
            // $learnedWords = $learnedWords->map(function ($word) {
            //     $word->shouldKnow = true;
            //     return $word;
            // });

            // Get new word or level up
            if (count($knownWords) == count($learnedWords)) {
                /**
                 *
                 * Get A New Word
                 *
                 */

                $notLearnedWords = Verb::whereNotIn('id', $levelDictionary)->get()->toArray();

                $randomWord = $notLearnedWords[array_rand($notLearnedWords)];

                $level->dictionary = serialize([...$levelDictionary, $randomWord['id']]);

                $learnedWordIds = $learnedWords->map(function ($word) {
                    return $word->verb_id;
                });

                if (!$learnedWordIds->contains($randomWord['id'])) {
                    auth()->user()->learnedWords()->create(['verb_id'=>$randomWord['id']]);
                }

                $level->setTargetWord($randomWord['id']);
                $level->setInputMode('kana');
                $message = $level->getNewWordMessage($randomWord);
                $level->clearUserInput();

                $level->saveGame();

                return view('app', ['message'=>$message]);
            }


            // Filter learned words to words that are also available at the level, to retain the times right and times wrong metrics
            $learnedWords = $learnedWords->filter(function ($word) use ($levelDictionary) {
                return $levelDictionary->contains($word->verb_id);
            });

            $wordLists = [
                'strugglingWords'=>$learnedWords->filter(function ($word) {
                    return $word->timesWrong > $word->timesRight;
                }),
                'masteredWords'=> $knownWords->filter(function ($word) {
                    return $word->timesRight > ($word->timesWrong * 2);
                }),
                'otherWords' => []
            ];
    
            $wordLists['otherWords'] = $learnedWords->filter(function ($word) use ($wordLists) {
                $results = collect($wordLists['strugglingWords'])->contains(function ($w) use ($word) {
                    return $w->verb_id == $word->verb_id;
                });
                return !$results;
            });
    
            $odds = [
                'strugglingWords' => 50,
                'masteredWords' => 10,
                'otherWords' => 40
            ];
            // fill this words from the odds
            $options = [];

            foreach ($odds as $list=>$chance) {
                while ($chance-- > 0) {
                    $options = array_merge($options, $wordLists[$list]->toArray());
                }
            }
    
            $randomWord=$options[rand(0, count($options)-1)];
            $level->setTargetWord($randomWord['verb_id']);
            $level->setInputMode('kana');
            // clear user inputs
            $level->clearUserInput();
        }
        // update the db
        $level->saveGame();
        if (count($knownWords) == env('LEVEL_CAP')) {
            $level->increaseLevel();
            $level->loadGame();
            $level->saveGame();
        }

        return view('app', ['message'=>$message]);
    }
}
