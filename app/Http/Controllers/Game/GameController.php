<?php

namespace App\Http\Controllers\Game;

use App\Models\Verb;
use App\Models\Level;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class GameController extends Controller
{
    //
    public function index()
    {
        $games = auth()->user()->games;
        // If there are no previous games, create a new game and level, and apply the dictionary
        if (!count($games)>=1) {
            $learnedDictionary = auth()->user()->learnedWords;

            if (!count($learnedDictionary) > 0) {
                $verbs = collect(DB::table('verbs')->get());// Add randomize function so that every new game doesn't return the same words, probably abstract out into an api endpoint or controller
                $verbs->splice(3);
                $learnedDictionary = $verbs->map(function ($item) {
                    auth()->user()->learnedWords()->create(['verb_id'=>$item->id]);
                    
                    return $item->id;
                })->toArray();
            }

            $level_dictionary = collect($learnedDictionary)->flatMap(function ($item) {
                return Verb::where('id', '=', $item->verb_id)->get();
            });
            $game_dictionary = collect($learnedDictionary)->flatMap(function ($item) {
                $word = Verb::where('id', '=', $item->verb_id)->limit(1)->get();
                return $word;
            });
    
        
            auth()->user()->games()->create()->levels()->create(['dictionary'=>$level_dictionary]);
            return view('app', ['game' => $game_dictionary]);
        }
        $game = auth()->user()->games()->orderBy('updated_at', 'desc')->limit(1)->get()->first();
        $game = Level::where('game_id', '=', $game->id)->orderBy('updated_at', 'desc')->limit(1)->get()->first();

        $level_dictionary = unserialize($game->dictionary);
        $level_dictionary = collect($level_dictionary)->flatmap(function ($id) {
            return Verb::where('id', '=', $id)->limit(1)->get();
        });
        // dd($level_dictionary);
        $game->dictionary = $level_dictionary;
        return view('app', ['game'=>$game]);
    }
    public function store(Request $request)
    {
        $dictionary = DB::table('verbs')->get();
        auth()->user()->games()->create();
    }
}
