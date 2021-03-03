<?php

namespace App\Http\Controllers\Game;

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
        $game = app(Game::class);
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
        // explode meanings
        // if correct, increase times right for global and user statistics
        // if incorrect, increase times wrong for global and user statistics,
        // submit new topScore if applicable, submit new topStreak if applicable,
        // increase level OR restart level
        // reset score, reset streak
        // get new word
        // set input mode kana
        dd($game);
    }
}
