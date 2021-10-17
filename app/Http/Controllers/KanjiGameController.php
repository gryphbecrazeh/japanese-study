<?php

namespace App\Http\Controllers;

use App\Models\Game;
use App\Models\Verb;
use App\Models\Kanji;
use App\Models\LearnedWord;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;

class KanjiGameController extends Controller
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
        $game_type = 'kanji';
        $game = $user->games()->where('game_type', '=', $game_type)->orderBy('updated_at', 'desc')->get()->first();
        $game_model = Kanji::class;

        $message = $request['message'] ?? null;

        if (!$game) {
            // $new_game = new Game($game_type);
            $game = Game::create(['user_id' => $user->id, 'game_type' => $game_type]);
        }


        $current_level = $game->get_active_level($game_type)->toArray();
        $current_level['targetWord'] = $game_model::where('id', '=', $current_level['targetWord'])->get()->first()->toArray();
        $current_level['targetWord']['meanings'] = \unserialize($current_level['targetWord']['meanings']);


        $current_level['targetWord']['kunyomi'] = \unserialize($current_level['targetWord']['kunyomi']);
        $current_level['targetWord']['onyomi'] = \unserialize($current_level['targetWord']['onyomi']);

        $target_word_stats = $user->learned_words()->where('kanji_id', '=', $current_level['targetWord']['id'])->get()->first();
        $current_level['targetWord']['shouldKnow'] = $target_word_stats->shouldKnow;
        if ($current_level['inputMode'] === 'kana') {
            $current_level['inputMode'] = 'onyomi';
        }


        return view('kanji-game-player', [
            'id' => $game->id,
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

    public function store(Request $request)
    {
        $message = ['type' => null, 'value' => null];

        /**
         * 
         * How to score
         * 
         * times right will only increase if you get the onyomi AND kunyomi right
         * sometimes ONYOMI or KUNYOMI will not have answers, need to figure out if I will render out an empty question, or if I won't show the question at all
         * 
         * 
         */

        // Import Models
        $user = auth()->user();
        $game_type = 'kanji';

        $game = $user->games()->where('game_type', '=', $game_type)->orderBy('updated_at', 'desc')->get()->first();

        $message = ['type' => '', 'message' => ''];

        $current_level_model = $game->get_active_level($game_type);
        $score = (int) $current_level_model->score ?? 0;
        $streak = (int) $current_level_model->streak ?? 0;

        // Explode the current level to update attributes
        $current_level = $current_level_model->toArray();


        $target_word_model = Kanji::where('id', '=', $current_level['targetWord'])->get()->first();
        $learned_word_model = $user->learned_words()->where('kanji_id', '=', $target_word_model->id)->get()->first();

        $current_level['targetWord'] = $target_word_model->toArray();

        $current_level['targetWord']['meanings'] =  \unserialize($current_level['targetWord']['meanings']);
        $current_level['targetWord']['onyomi'] =  \unserialize($current_level['targetWord']['onyomi']);
        $current_level['targetWord']['kunyomi'] =  \unserialize($current_level['targetWord']['kunyomi']);

        if ($current_level['inputMode'] === 'kana') {
            $current_level['inputMode'] = 'onyomi';
        }

        $user_input = $request->get($current_level['inputMode']);

        $answers = \explode(', ', $user_input) ?? [];
        switch ($current_level['inputMode']) {

            case 'onyomi':
                $matches = 0;
                if ($current_level['targetWord']['onyomi'] == []) {
                    $matches++;
                }
                foreach ($current_level['targetWord']['onyomi'] as $option) {
                    foreach ($answers as $answer) {
                        if ($answer == $option) {
                            $matches++;
                        }
                    }
                }
                if ($matches > 0) {
                    // $learned_word_model->increaseTimesRight();
                    $nextMode = $current_level['targetWord']['kunyomi'] != [] ? 'kunyomi' : 'meanings';
                    $current_level_model->setInputMode($nextMode);
                    $message['type'] = 'success';
                    $message['value'] = 'Correct!';
                    //
                } else {
                    $learned_word_model->increaseTimesWrong();
                    $message['type'] = 'fail';
                    $message['value'] = 'Incorrect! Try Again...';
                }
                break;
            case 'kunyomi':
                $matches = 0;
                if ($current_level['targetWord']['kunyomi'] == []) {
                    $matches++;
                }

                foreach ($current_level['targetWord']['kunyomi'] as $option) {
                    foreach ($answers as $answer) {
                        if ($answer == $option) {
                            $matches++;
                        }
                    }
                }
                if ($matches > 0) {
                    // $learned_word_model->increaseTimesRight();
                    $current_level_model->setInputMode('meanings');
                    $message['type'] = 'success';
                    $message['value'] = 'Correct!';
                    //
                } else {
                    $learned_word_model->increaseTimesWrong();
                    $message['type'] = 'fail';
                    $message['value'] = 'Incorrect! Try Again...';
                }
                break;
            case 'meanings':
                $meanings = \explode(', ', $current_level['targetWord']['meanings'][0]);
                // Check the meanings input
                $correct_meanings = 0;
                foreach ($meanings as $index => $meaning) {
                    foreach ($answers as $input_meaning) {
                        if ($input_meaning == $meaning) {
                            $learned_word_model->increaseTimesRight();
                            unset($meanings[$index]);
                            $correct_meanings++;
                        }
                    }
                }

                $current_level_model->increaseScore($correct_meanings);
                if (!$correct_meanings > 0) {
                    $learned_word_model->increaseTimesWrong();
                    $score = 0;
                    $current_level_model->resetScore();
                    $streak = 0;
                    $current_level_model->resetStreak();
                    $message['type'] = 'fail';
                    $message['value'] = 'Incorrect! ' . $target_word_model->politeForm . ' means to ' . implode(', ', $current_level['targetWord']['meanings']);
                } else {
                    $message['type'] = 'success';
                    $message['value'] = 'Correct! ' . $target_word_model->politeForm . ' means to ' . implode(', ', $current_level['targetWord']['meanings']);
                    $streak++;
                }
                $current_level_model->increaseStreak($streak);

                // check if level needs to be increased
                // Get new target word
                $new_target_word_id = $current_level_model->newTargetWord('onyomi');
                $learned_word_model = $user->learned_words()->where('kanji_id', '=', $new_target_word_id)->get()->first();

                if (!$learned_word_model->timesRight > 0 && !$learned_word_model->timesWrong > 0) {
                    $message['value'] = 'New Word!' . $target_word_model->politeForm . ' means to ' . implode(', ', $current_level['targetWord']['meanings']);
                }

                break;
        }


        $current_level = $game->get_active_level($game_type)->toArray();
        $current_level['targetWord'] = Kanji::where('id', '=', $current_level['targetWord'])->get()->first()->toArray();
        $current_level['targetWord']['meanings'] = \unserialize($current_level['targetWord']['meanings']);


        $current_level['targetWord']['kunyomi'] = \unserialize($current_level['targetWord']['kunyomi']);
        $current_level['targetWord']['onyomi'] = \unserialize($current_level['targetWord']['onyomi']);

        $target_word_stats = $user->learned_words()->where('kanji_id', '=', $current_level['targetWord']['id'])->get()->first();
        $current_level['targetWord']['shouldKnow'] = $target_word_stats->shouldKnow;
        if ($current_level['inputMode'] === 'kana') {
            $current_level['inputMode'] = 'onyomi';
        }

        $remaing_tries = $current_level['targetWord']['timesRight'] - ($current_level['targetWord']['timesWrong'] + env('WORD_DIFFICULTY'));

        return view('kanji-game-player', [
            'id' => $game->id,
            'game_type' => $game_type,
            'dictionary' => \json_decode($current_level['dictionary']),
            'score' => $current_level['score'] ?? 0,
            'streak' => $current_level['streak'],
            'level' => $current_level['level'],
            'remaining_tries' => $remaing_tries,
            'topStreak' => $current_level['topStreak'],
            'topScore' => $current_level['topScore'],
            'targetWord' => $current_level['targetWord'],
            'inputMode' => $current_level['inputMode'],
            'message' => $message
        ]);
    }
}
