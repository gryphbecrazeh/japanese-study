<?php

namespace App\Http\Controllers;

use App\Models\Game;
use App\Models\Verb;
use App\Models\LearnedWord;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;

class GameController extends Controller
{
    public $game;
    public function __construct()
    {
    }
    //
    public function index(Request $request)
    {
        $user = auth()->user();
        $games = $user->games()->orderBy('updated_at', 'desc')->get();
        $game_type = Route::current()->parameter('game_type');
        $game_id = Route::current()->parameter('game_id');
        $selected_game = null;


        if (!$game_id && !count($games) > 0) {
            $new_game = Game::create(['user_id' => $user->id]);
            return \redirect()->route('game.verb.continue', ['game_type' => $game_type, 'game_id' => $new_game->id]);
        } else {
            $game_id = $games->first()->id;
        }

        if ($game_id) {
            $selected_game = $user->games()->where([['id', '=', $game_id]])->get()->first();
        }

        $current_level = $selected_game->get_active_level()->toArray();
        $current_level['targetWord'] = Verb::where('id', '=', $current_level['targetWord'])->get()->first()->toArray();
        $current_level['targetWord']['meanings'] = \unserialize($current_level['targetWord']['meanings']);
        $current_level['targetWord']['kanji'] = \unserialize($current_level['targetWord']['kanji']);
        $target_word_stats = $user->learned_words()->where('verb_id', '=', $current_level['targetWord']['id'])->get()->first();
        $current_level['targetWord']['shouldKnow'] = $target_word_stats->shouldKnow;
        return view('game-player', [
            'id' => $game_id,
            'game_type' => $game_type,
            'dictionary' => \json_decode($current_level['dictionary']),
             'score' => $current_level['score'] ?? 0,
             'streak' => $current_level['streak'],
              'level' => $current_level['level'],
               'topStreak' => $current_level['topStreak'],
                'topScore' => $current_level['topScore'],
                'targetWord' => $current_level['targetWord'],
                'inputMode' => $current_level['inputMode']
                 ]);
    }

    public function store(Request $request)
    {
        $user = auth()->user();
        $game_type = Route::current()->parameter('game_type');
        $game_id = Route::current()->parameter('game_id');
        $selected_game = $user->games()->where([['id', '=', $game_id]])->get()->first();
        $current_level = $selected_game->get_active_level()->toArray();
        $kana =  $request->get('kana') ?? null;
        $meanings = $request->get('meanings') ?? null;
        $current_level['targetWord'] = Verb::where('id', '=', $current_level['targetWord'])->get()->first()->toArray();
        $current_level['targetWord']['meanings'] = \unserialize($current_level['targetWord']['meanings']);
        $current_level['targetWord']['kanji'] = \unserialize($current_level['targetWord']['kanji']);
        $target_word_stats = $user->learned_words()->where('verb_id', '=', $current_level['targetWord']['id'])->get()->first()->toArray();
        // Check the Kana input
        if ($current_level['inputMode'] === 'kana' && $kana && !$current_level['kana']) {
            if ($kana === $current_level['targetWord']['politeForm']) {
                // Increase times right
                $target_word_stats['timesRight']++;
                // Check if should know
                if (($target_word_stats['timesWrong'] + 5) < $target_word_stats['timesRight'] && !$target_word_stats['shouldKnow']) {
                    $target_word_stats['shouldKnow'] = true;
                }
                // Update global statistics
                // Change level mode to meanings
                //
                dd($target_word_stats);
            } else {
                $target_word_stats['timesWrong']++;
                if ($target_word_stats['timesWrong'] > $target_word_stats['timesRight'] &&$target_word_stats['shouldKnow']) {
                    $target_word_stats['shouldKnow'] = false;
                }
            }
            // update level
            // redirect to back to continue route
            return \redirect()->route('game.verb.continue', ['game_id'=>$game_id, 'game_type' => $game_type]);
        }
        // Check the meanings input
    }
}
