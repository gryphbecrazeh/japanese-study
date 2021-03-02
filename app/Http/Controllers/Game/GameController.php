<?php

namespace App\Http\Controllers\Game;

use App\Models\Game;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class GameController extends Controller
{
    //
    public function index()
    {
        $learnedWords = auth()->user()->learnedWords;

        if (!count($learnedWords) > 0) {
            $verbs = collect(DB::table('verbs')->get());// Add randomize function so that every new game doesn't return the same words, probably abstract out into an api endpoint or controller
            $verbs->splice(3);
            $learnedWords = $verbs->map(function ($item) {
                auth()->user()->learnedWords()->create(['verb_id'=>$item->id]);
                return $item->id;
            })->toArray();
        }

        $dictionary = [...$learnedWords];

        $level_dictionary = collect($dictionary)->flatMap(function ($item) {
            return DB::table('verbs')->where('id', '=', $item->verb_id)->get();
        });
        $game_dictionary = collect($dictionary)->flatMap(function ($item) {
            $word = DB::table('verbs')->where('id', '=', $item->verb_id)->limit(1)->get();
            return $word;
        });

        dd($level_dictionary);
        $games = auth()->user()->games;

        if (!count($games)>=1) {
            auth()->user()->games()->create()->levels()->create(['dictionary'=>$level_dictionary]);
        }

        return view('app', ['dictionary' => $game_dictionary]);
    }
    public function store(Request $request)
    {
        $dictionary = DB::table('verbs')->get();
        auth()->user()->games()->create();
    }
}
