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
    public function __construct(Game $game)
    {
        $this->game = $game;
    }
    //
    public function index()
    {
        return view('app');
    }
    //
    public function store(Request $request)
    {
        $message = [
            'type'=>null,
            'value'=>null
        ];
        $game = app(Game::class); // Figure out how to get URL and supply filterable parameters ie: word type, hasLearned, verb/noun/adjective
        // you're stupid, this controller is already on a route, just make them extend a base one or something
        $level = GModel::where('id', '=', $game->gameId)->get()->first()->levels()->orderBy('updated_at')->get()->first();
        $targetWord = Verb::where('id', '=', $game->targetWord)->limit(1)->get()->first();

        if ($game->inputMode == 'kana' && !is_null($request->input('kana'))) {
            if ($request->input('kana') == $targetWord->politeForm) {
                $game->setUserInput('kana', $request->input('kana'));
                $game->setInputMode('meanings');
                $game->saveGame();
            }
            // Return back a message saying what the issue is
            return view('app');
        }
        if ($game->inputMode == 'meanings' && !is_null($request->input('meanings'))) {
            $game->setUserInput('meanings', $request->input('meanings'));
            $applicableMeanings = unserialize($targetWord->meanings);
            /**
             *
             * Check if correct, and score
             *
             */
            $meanings = preg_replace('/^\s*to\ +/i', '', $request->input('meanings'));
            preg_match_all('/[\w\s]+(?=\,?\s?)/', $meanings, $answers);
            $answers = collect($answers)->first();
            $timesCorrect = 0;
            foreach ($answers as  $answer) {
                if (collect($applicableMeanings)->contains(function ($value, $key) use ($answer) {
                    return $answer == $value;
                })) {
                    $applicableMeanings = collect($applicableMeanings)->filter(function ($meaning) use ($answer) {
                        return $meaning != $answer;
                    });
                    $timesCorrect++;
                }
            }
            // Can I abuse this by repeatedly refreshing and resubmitting the request? maybe not if I were actually finishing this
            if ($timesCorrect > 0) {
                $targetWord->increaseTimesRight();
                auth()->user()->learnedWords()->where('verb_id', '=', $targetWord->id)->get()->first()->increaseTimesRight();
                $game->increaseScore();
                $game->increaseStreak();
            } else {
                $targetWord->increaseTimesWrong();
                auth()->user()->learnedWords()->where('verb_id', '=', $targetWord->id)->get()->first()->increaseTimesWrong();
                $game->resetScore();
                $game->resetStreak();
            }
    
    
            $learnedWords = auth()->user()->learnedWords()->get();
    
            // debug
            // $learnedWords = $learnedWords->map(function ($word) {
            //     $word->shouldKnow = true;
            //     return $word;
            // });
    
            $knownWords = $learnedWords->filter(function ($word) {
                return $word->shouldKnow;
            });
            // Get new word or level up
    
            if (count($knownWords) === count($learnedWords)) {
                if (count($knownWords)===10) {
                    dd('increase level');
                }
                // set message to new word with meaning
                dd('get a new word');
            }
    
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
            $game->setTargetWord($randomWord['verb_id']);
            $game->setInputMode('kana');
            // clear user inputs
            $game->clearUserInput();
        }
        // update the db
        $game->saveGame();
        return view('app', ['message'=>$message]);
    }
}
