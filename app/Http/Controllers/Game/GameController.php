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
    //
    public function index(Game $game)
    {
        return view('app', ['game'=>$game]);
        // return view('app');
    }
    public function store(Request $request)
    {
        $game = app(Game::class); // Figure out how to get URL and supply filterable parameters ie: word type, hasLearned, verb/noun/adjective

        $level = GModel::where('id', '=', $game->gameId)->get()->first()->levels()->orderBy('updated_at')->get()->first();


        $targetWord = Verb::where('id', '=', $game->targetWord)->limit(1)->get()->first();

        if (!is_null($request->input('kana'))) {
            if ($request->input('kana') == $targetWord->politeForm) {
                $game->setUserInput('kana', $request->input('kana'));
                $game->setInputMode('meanings');
                $game->saveGame();
                return view('app', ['game'=>app(Game::class)]);
            } else {
                return view('app', ['game'=>app(Game::class)]);
            }
        }
        if (!is_null($request->input('meanings'))) {
            $game->setUserInput('meanings', $request->input('meanings'));
        }

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
            $level->increaseScore();
            $level->increaseStreak();
        } else {
            $targetWord->increaseTimesWrong();
            auth()->user()->learnedWords()->where('verb_id', '=', $targetWord->id)->get()->first()->increaseTimesWrong();
            $level->resetScore();
            $level->resetStreak();
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

        $rand = rand(1, 100);
        $sum = 0;
        $chosenList;

        foreach ($odds as $f=>$v) {
            $sum += $v;
            if ($sum >= $rand) {
                $chosenList = $f;
                break;
            }
        }
        $randomList = $wordLists[$chosenList];
        $randomWord=$randomList[count($randomList) > 0 ? rand(0, count($randomList)-1) : 0];
        $level->setTargetWord($randomWord);
        $level->setInputMode('kana');
    }
}
