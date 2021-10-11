<?php

namespace App\Http\Controllers;

use App\Models\Game;
use App\Models\Verb;
use App\Models\Kanji;
use App\Models\LearnedWord;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;

class VerbGameController extends Controller
{
    public $game;
    public function __construct()
    {
    }
    //
    public function index(Request $request)
    {
        // Figure out the issue with word aggregation, why is it automatically failing and I have to refresh repeatedly to progress
        $user = auth()->user();
        $games = $user->games()->orderBy('updated_at', 'desc')->get();
        $game_type = 'verb';
        $game_id = Route::current()->parameter('game_id');
        $message = $request['message'] ?? null;

        $selected_game = null;

        if (!$game_id && !count($games) > 0) {
            // $new_game = new Game($game_type);
            $new_game = Game::create(['user_id' => $user->id, 'game_type' => $game_type]);
            return \redirect()->route('game.verb.continue', ['game_type' => $game_type, 'game_id' => $new_game->id]);
        } else {
            $game_id = $games->first()->id;
        }

        if ($game_id) {
            $selected_game = $user->games()->where([['id', '=', $game_id]])->get()->first();
        }

        if (!$selected_game) {
            // If no game is found break
            return null;
        }

        $game_model = null;

        switch ($game_type) {
            case 'kanji':
                $game_model = Kanji::class;
                break;
            default:
            case 'verb':
                $game_model = Verb::class;
                break;
        }

        if ($game_type === 'kanji') {
        }

        if ($game_type === 'verb') {
            $current_level = $selected_game->get_active_level($game_type)->toArray();
            $current_level['targetWord'] = $game_model::where('id', '=', $current_level['targetWord'])->get()->first()->toArray();
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
                'inputMode' => $current_level['inputMode'],
                'message' => json_decode($message)
            ]);
        }
        return 'Game not ready';
    }

    public function store(Request $request)
    {
        $message = ['type' => null, 'value' => null];

        // Import Models
        $user = auth()->user();
        $game_type = Route::current()->parameter('game_type');
        $game_id = Route::current()->parameter('game_id');
        $selected_game = $user->games()->where([['id', '=', $game_id]])->get()->first();

        $current_level_model = $selected_game->get_active_level($game_type);
        $score = (int) $current_level_model->score ?? 0;
        $streak = (int) $current_level_model->streak ?? 0;

        // Explode the current level to update attributes
        $current_level = $current_level_model->toArray();

        $game_model = null;

        switch ($game_type) {
            case 'kanji':
                $game_model = Kanji::class;
                break;
            default:
            case 'verb':
                $game_model = Verb::class;
                break;
        }


        $target_word_model = $game_model::where('id', '=', $current_level['targetWord'])->get()->first();
        $learned_word_model = $user->learned_words()->where('verb_id', '=', $target_word_model->id)->get()->first();

        $current_level['targetWord'] = $target_word_model->toArray();
        $level_meanings = \unserialize($current_level['targetWord']['meanings']);
        $current_level['targetWord']['meanings'] = $level_meanings;

        // Collect Inputs
        $kana =  $request->get('kana') ?? null;
        $meanings = \explode(', ', $request->get('meanings')) ?? [];

        // Check the Kana input
        if ($current_level['inputMode'] === 'kana' && $kana && !$current_level['kana']) {
            if ($kana === $current_level['targetWord']['politeForm']) {
                $learned_word_model->increaseTimesRight();
                $current_level_model->setInputMode('meanings');
                $message['type'] = 'success';
                $message['value'] = 'Correct!';
                //
            } else {
                $learned_word_model->increaseTimesWrong();
                $message['type'] = 'fail';
                $message['value'] = 'Incorrect! Try Again...';
            }
            return \redirect()->route('game.verb.continue', ['game_id' => $game_id, 'game_type' => $game_type, 'message' => \json_encode($message)]);
        }

        // Check the meanings input
        $correct_meanings = [];
        foreach ($meanings as $index => $meaning) {
            $meaning = str_replace('to ', '', $meaning);
            if (in_array($meaning, $current_level['targetWord']['meanings'])) {
                $learned_word_model->increaseTimesRight();
                unset($current_level['targetWord']['meanings'][$index]);
                $correct_meanings[] = $meaning;
            }
        }

        $current_level_model->increaseScore(count($correct_meanings));
        if (!count($correct_meanings) > 0) {
            $learned_word_model->increaseTimesWrong();
            $score = 0;
            $current_level_model->resetScore();
            $streak = 0;
            $current_level_model->resetStreak();
            $message['type'] = 'fail';
            $message['value'] = 'Incorrect! ' . $target_word_model->politeForm . ' means to ' . implode(', ', $level_meanings);
        } else {
            $message['type'] = 'success';
            $message['value'] = 'Correct! ' . $target_word_model->politeForm . ' means to ' . implode(', ', $level_meanings);
            $streak++;
        }
        $current_level_model->increaseStreak($streak);

        // check if level needs to be increased
        // Get new target word
        $new_target_word_id = $current_level_model->newTargetWord();
        $learned_word_model = $user->learned_words()->where('verb_id', '=', $new_target_word_id)->get()->first();

        if (!$learned_word_model->timesRight > 0 && !$learned_word_model->timesWrong > 0) {
            $message['value'] = 'New Word!' . $target_word_model->politeForm . ' means to ' . implode(', ', $level_meanings);
        }


        return \redirect()->route('game.verb.continue', ['game_id' => $game_id, 'game_type' => $game_type, 'message' => \json_encode($message)]);
    }
}
