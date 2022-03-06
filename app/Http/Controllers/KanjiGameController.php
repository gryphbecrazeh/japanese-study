<?php

namespace App\Http\Controllers;

use App\Models\Game;
use App\Models\User;
use App\Models\Kanji;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;

class KanjiGameController extends Controller
{
    public $game_type;
    public function __construct()
    {
        $this->game_type = 'kanji';
    }
    //
    public function index(Request $request)
    {
        Log::debug('index hit');

        // Figure out the issue with word aggregation, why is it automatically failing and I have to refresh repeatedly to progress
        $user = auth()->user();

        $game = $user->games()->where('game_type', '=', $this->game_type)->orderBy('updated_at', 'desc')->first();
        // $game->create_level(true, 'n5');

        $message = $request['message'] ?? null;

        if (!$game) {
            $game = Game::create(['user_id' => $user->id, 'game_type' => $this->game_type]);
        }


        $current_level = $game->get_active_level($this->game_type)->toArray();


        $current_level['targetWord'] = $user->learned_words()->where('kanji_id', '=', $current_level['targetWord'])->first()->get_assembled_word();

        if ($current_level['inputMode'] === 'kana') {
            $current_level['inputMode'] = 'onyomi';
        }


        return view('kanji-game-player', [
            'id' => $game->id,
            'game_type' => $this->game_type,
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
        Log::debug('store hit');
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

        $user = auth()->user();
        $game = $user->games()->where('game_type', '=', $this->game_type)->orderBy('updated_at', 'desc')->first();
        if (!$game) {
            // $new_game = new Game($game_type);
            $game = Game::create(['user_id' => $user->id, 'game_type' => $this->game_type]);
        }

        $current_level_model = $game->get_active_level($this->game_type, 'n5');
        $target_word_model = Kanji::where('id', '=', $current_level_model->targetWord)->first();
        $learned_word = $user->learned_words()->where('kanji_id', '=', $current_level_model->targetWord)->first();
        $message = ['type' => '', 'message' => ''];


        $current_level = $current_level_model->toArray();
        $current_level['targetWord'] = $learned_word->get_assembled_word();
        // Dumb hack because creating a new game automatically sets it to kana, need to fix
        if ($current_level['inputMode'] === 'kana') {
            $current_level['inputMode'] = 'onyomi';
        }
        $user_input = $request->get($current_level['inputMode']);
        $answers = \explode(', ', $user_input) ?? [];

        $matches = 0;

        if ($current_level['targetWord'][$current_level['inputMode']] == []) {
            $matches++;
        }

        switch ($current_level['inputMode']) {

            case 'onyomi':
                foreach ($current_level['targetWord']['onyomi'] as $option) {
                    foreach ($answers as $answer) {
                        if ($answer == $option) {
                            $matches++;
                        }
                    }
                }
                if ($matches > 0) {
                    $nextMode = $current_level['targetWord']['kunyomi'] != [] ? 'kunyomi' : 'meanings';
                    $current_level_model->setInputMode($nextMode);
                    $message['type'] = 'success';
                    $message['value'] = 'Correct!';
                    //
                } else {
                    $learned_word->increaseTimesWrong();
                    $current_level_model->resetScore();
                    $current_level_model->resetStreak();
                    $message['type'] = 'fail';
                    $message['value'] = 'Incorrect! Try Again...';
                }
                break;


            case 'kunyomi':
                foreach ($current_level['targetWord']['kunyomi'] as $option) {
                    foreach ($answers as $answer) {
                        if ($answer == $option) {
                            $matches++;
                        }
                    }
                }
                if ($matches > 0) {
                    $current_level_model->setInputMode('meanings');
                    $message['type'] = 'success';
                    $message['value'] = 'Correct!';
                    //
                } else {
                    $learned_word->increaseTimesWrong();
                    $current_level_model->resetScore();
                    $current_level_model->resetStreak();
                    $message['type'] = 'fail';
                    $message['value'] = 'Incorrect! Try Again...';
                }
                break;


            case 'meanings':
                $meanings = \explode(', ', $current_level['targetWord']['meanings'][0]);
                // Check the meanings input
                foreach ($meanings as $index => $meaning) {
                    foreach ($answers as $input_meaning) {
                        if ($input_meaning == $meaning) {
                            $learned_word->increaseTimesRight();
                            unset($meanings[$index]);
                            $matches++;
                        }
                    }
                }
                $current_level_model->increaseScore($matches);
                if (!$matches > 0) {
                    $learned_word->increaseTimesWrong();
                    $current_level_model->resetScore();
                    $current_level_model->resetStreak();
                    $message['type'] = 'fail';
                    $message['value'] = 'Incorrect! ' . $target_word_model->politeForm . ' means ' . implode(', ', $current_level['targetWord']['meanings']);
                } else {
                    $message['type'] = 'success';
                    $message['value'] = 'Correct! ' . $target_word_model->politeForm . ' means ' . implode(', ', $current_level['targetWord']['meanings']);
                    $current_level_model->increaseStreak();
                }

                // check if level needs to be increased
                // Get new target word
                $new_target_word_id = $current_level_model->newTargetWord('onyomi');
                $learned_word = $user->learned_words()->where('kanji_id', '=', $new_target_word_id)->first();

                if (!$learned_word->timesRight > 0 && !$learned_word->timesWrong > 0) {
                    $message['value'] = 'New Word!' . $target_word_model->politeForm . ' means to ' . implode(', ', $current_level['targetWord']['meanings']);
                }
                break;
        }

        $current_level_model->save();
        $current_level = $game->get_active_level($this->game_type)->toArray();

        $current_level['targetWord'] = $user->learned_words()->where('kanji_id', '=', $current_level['targetWord'])->first()->get_assembled_word();



        if ($current_level['inputMode'] === 'kana') {
            $current_level['inputMode'] = 'onyomi';
        }

        $remaing_tries = $current_level['targetWord']['timesRight'] - ($current_level['targetWord']['timesWrong'] + env('WORD_DIFFICULTY'));
        $current_level['dictionary'] = json_decode($current_level['dictionary']);
        $current_level['remaining_tries'] = $remaing_tries;
        $current_level['message'] = $message;
        $current_level['game_type'] = $this->game_type;

        return view('kanji-game-player', $current_level);
    }
    public function api(Request $request)
    {
        Log::debug($request);
        // [2021-12-26 05:14:25] local.DEBUG: array (
        //     'id' => '3',
        //     'type' => 'kanji}',
        //     'value' => 'フ',
        //   )  

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

        // $user = auth()->user();
        // $game = $user->games()->where('game_type', '=', $this->game_type)->orderBy('updated_at', 'desc')->first();
        // if (!$game) {
        //     // $new_game = new Game($game_type);
        //     $game = Game::create(['user_id' => $user->id, 'game_type' => $this->game_type]);
        // }
        $game = Game::where('id', $request['id'])->first();
        // [2021-12-26 05:16:46] local.DEBUG: {"id":3,"user_id":1,"game_type":"kanji","created_at":"2021-10-22T12:29:10.000000Z","updated_at":"2021-10-22T12:29:10.000000Z","closed":null}  
        $user = User::where('id', $game->user_id)->first();
        $current_level_model = $game->get_active_level($this->game_type, 'n5');
        Log::debug($current_level_model);
        dd('do not proceed');
        $target_word_model = Kanji::where('id', '=', $current_level_model->targetWord)->first();
        $learned_word = $user->learned_words()->where('kanji_id', '=', $current_level_model->targetWord)->first();
        $message = ['type' => '', 'message' => ''];


        $current_level = $current_level_model->toArray();
        $current_level['targetWord'] = $learned_word->get_assembled_word();
        // Dumb hack because creating a new game automatically sets it to kana, need to fix
        if ($current_level['inputMode'] === 'kana') {
            $current_level['inputMode'] = 'onyomi';
        }
        $user_input = $request->get($current_level['inputMode']);
        $answers = \explode(', ', $user_input) ?? [];

        $matches = 0;

        if ($current_level['targetWord'][$current_level['inputMode']] == []) {
            $matches++;
        }

        switch ($current_level['inputMode']) {

            case 'onyomi':
                foreach ($current_level['targetWord']['onyomi'] as $option) {
                    foreach ($answers as $answer) {
                        if ($answer == $option) {
                            $matches++;
                        }
                    }
                }
                if ($matches > 0) {
                    $nextMode = $current_level['targetWord']['kunyomi'] != [] ? 'kunyomi' : 'meanings';
                    $current_level_model->setInputMode($nextMode);
                    $message['type'] = 'success';
                    $message['value'] = 'Correct!';
                    //
                } else {
                    $learned_word->increaseTimesWrong();
                    $current_level_model->resetScore();
                    $current_level_model->resetStreak();
                    $message['type'] = 'fail';
                    $message['value'] = 'Incorrect! Try Again...';
                }
                break;


            case 'kunyomi':
                foreach ($current_level['targetWord']['kunyomi'] as $option) {
                    foreach ($answers as $answer) {
                        if ($answer == $option) {
                            $matches++;
                        }
                    }
                }
                if ($matches > 0) {
                    $current_level_model->setInputMode('meanings');
                    $message['type'] = 'success';
                    $message['value'] = 'Correct!';
                    //
                } else {
                    $learned_word->increaseTimesWrong();
                    $current_level_model->resetScore();
                    $current_level_model->resetStreak();
                    $message['type'] = 'fail';
                    $message['value'] = 'Incorrect! Try Again...';
                }
                break;


            case 'meanings':
                $meanings = \explode(', ', $current_level['targetWord']['meanings'][0]);
                // Check the meanings input
                foreach ($meanings as $index => $meaning) {
                    foreach ($answers as $input_meaning) {
                        if ($input_meaning == $meaning) {
                            $learned_word->increaseTimesRight();
                            unset($meanings[$index]);
                            $matches++;
                        }
                    }
                }
                $current_level_model->increaseScore($matches);
                if (!$matches > 0) {
                    $learned_word->increaseTimesWrong();
                    $current_level_model->resetScore();
                    $current_level_model->resetStreak();
                    $message['type'] = 'fail';
                    $message['value'] = 'Incorrect! ' . $target_word_model->politeForm . ' means ' . implode(', ', $current_level['targetWord']['meanings']);
                } else {
                    $message['type'] = 'success';
                    $message['value'] = 'Correct! ' . $target_word_model->politeForm . ' means ' . implode(', ', $current_level['targetWord']['meanings']);
                    $current_level_model->increaseStreak();
                }

                // check if level needs to be increased
                // Get new target word
                $new_target_word_id = $current_level_model->newTargetWord('onyomi');
                $learned_word = $user->learned_words()->where('kanji_id', '=', $new_target_word_id)->first();

                if (!$learned_word->timesRight > 0 && !$learned_word->timesWrong > 0) {
                    $message['value'] = 'New Word!' . $target_word_model->politeForm . ' means to ' . implode(', ', $current_level['targetWord']['meanings']);
                }
                break;
        }

        $current_level_model->save();
        $current_level = $game->get_active_level($this->game_type)->toArray();

        $current_level['targetWord'] = $user->learned_words()->where('kanji_id', '=', $current_level['targetWord'])->first()->get_assembled_word();



        if ($current_level['inputMode'] === 'kana') {
            $current_level['inputMode'] = 'onyomi';
        }

        $remaing_tries = $current_level['targetWord']['timesRight'] - ($current_level['targetWord']['timesWrong'] + env('WORD_DIFFICULTY'));
        $current_level['dictionary'] = json_decode($current_level['dictionary']);
        $current_level['remaining_tries'] = $remaing_tries;
        $current_level['message'] = $message;
        $current_level['game_type'] = $this->game_type;

        return $current_level;
    }
}
