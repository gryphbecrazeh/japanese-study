<?php
namespace App\Game;

use App\Models\Game as G;
use App\Models\Verb;
use App\Models\Level;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class Game
{
    /**
    * Create a new component instance.
    *
    * @return void
    */
    public $id;
    public $inputMode;
    public $targetWord;
    public $dictionary = [];
    public $score = 0;
    public $level = 0;
    public $topStreak = 0;
    public $topScore = 0;
    public $shouldKnow = false;

    public function loadGame()
    {
        if (is_null(auth()->user())) {
            // This attempt to redirect isn't working, it just straight up fails because there is no user to authorize when this is initially ran
            return redirect(route('home'));
        }

        $learnedWords = collect(auth()->user()->learnedWords) ?? collect([]);

        $learnedDictionary = $learnedWords->map(function ($word) {
            return $word->verb_id;
        })->toArray();
        $game = null;

        $games = auth()->user()->games;
        // If there are no previous games, create a new game and level, and apply the dictionary
        if (!count($games)>=1) {
            if (!count($learnedDictionary) > 0) {
                $verbs = Verb::limit(3)->get();// Add randomize function so that every new game doesn't return the same words, probably abstract out into an api endpoint or controller
                $learnedDictionary = $verbs->map(function ($word) {
                    auth()->user()->learnedWords()->create([ 'verb_id'=> $word->id ]);
                    return $word->id;
                })->toArray();
            }
    
            $level_dictionary = collect($learnedDictionary)->flatMap(function ($id) {
                return Verb::where('id', '=', $id)->get();
            });
            $game_dictionary = collect($learnedDictionary)->flatMap(function ($id) {
                $word = Verb::where('id', '=', $id)->limit(1)->get();
                return $word;
            });
            $game = auth()->user()->games()->create()->levels()->create(['dictionary'=>serialize($learnedDictionary)]);
        } else {
            $game = auth()->user()->games()->orderBy('updated_at', 'desc')->limit(1)->get()->first();

            $game = $game->levels()->orderBy('updated_at', 'desc')->limit(1)->get()->first();
        }

        // This was re-assigning the value of the dictionary, and I'd rather just unserialize it every time it's accessed
        // $level_dictionary = unserialize($game->dictionary);
        // $level_dictionary = collect($level_dictionary)->flatmap(function ($id) {
        //     return Verb::where('id', '=', $id)->limit(1)->get();
        // });
        // $game->dictionary = $level_dictionary;
        // $dictionary = collect($game['dictionary'])->map(function ($word) {
        //     $word->meanings = [...unserialize($word->meanings)];
        //     $word->kanji = unserialize($word->kanji);
        //     return $word;
        // });
        $this->targetWord = $game['targetWord'] ?? unserialize($game['dictionary'])[0];
        $this->id = $game['id'];
        $this->dictionary = $game['dictionary'];
        $this->score = $game['score'];
        $this->streak = $game['streak'];
        $this->level = $game['level'];
        $this->topStreak = $game['topStreak'];
        $this->topScore = $game['topScore'];
        $this->shouldKnow = false;
        $this->modes = ['politeForm'];
        $this->inputMode = $game['inputMode'] ?? 'kana';
        $this->userInput = [
            'kana' => $game['kana'] ?? '',
            'meanings' =>$game['meanings'] ?? ''
        ];
    }
    public function getCorrectKanaMessage(Verb $verb = null)
    {
        $message = [
            'type'=>'success',
            'value'=>null
        ];
        $kanji = unserialize($verb->kanji);
        $message['value'] = "Correct! " . $kanji['word'] . " is " . $verb->politeForm;

        return  $message;
    }
    public function getWrongKanaMessage(Verb $verb = null)
    {
        $message = [
            'type'=>'fail',
            'value'=>null
        ];
        $kanji = unserialize($verb->kanji);
        $message['value'] = "Sorry! Please try again...";// . $kanji['word'] . " is " . $verb->politeForm;

        return  $message;
    }

    public function getCorrectMeaningMessage(Verb $verb = null)
    {
        $message = [
            'type'=>'success',
            'value'=>null
        ];
        $kanji = unserialize($verb->kanji);
        $message['value'] = "Correct! " . $kanji['word'] . " means " . $verb->meaning;

        return  $message;
    }
    public function getWrongMeaningMessage(Verb $verb = null)
    {
        $message = [
            'type'=>'fail',
            'value'=>null
        ];
        $kanji = unserialize($verb->kanji);
        $message['value'] = "Incorrect! " . $kanji['word'] . " means " . $verb->meaning;

        return  $message;
    }

    public function getNewWordMessage($verb = null)
    {
        $message = [
            'type'=>'success',
            'value'=>null
        ];
        $kanji = unserialize($verb['kanji']);
        $message['value'] = "New Word! " . $kanji['word'] . " means " . $verb['meaning'];

        return  $message;
    }


    public function setTopScore()
    {
        $this->topScore = $this->score;
    }
    public function setTopStreak()
    {
        $this->topStreak = $this->streak;
    }
    public function increaseScore()
    {
        $this->score++;
        if ($this->score > $this->topScore) {
            $this->setTopScore();
        }
    }
    public function resetScore()
    {
        $this->score = 0;
    }
    public function increaseStreak()
    {
        $this->streak++;
        if ($this->streak > $this->topStreak) {
            $this->setTopStreak();
        }
    }
    public function resetStreak()
    {
        $this->streak=0;
    }
    public function setTargetWord($id)
    {
        $this->targetWord = $id;
    }
    public function setInputMode($mode)
    {
        $this->inputMode = $mode;
    }
    public function setUserInput($target, $value)
    {
        $updatedInput =  $this->userInput;
        $updatedInput[$target] = $value;
        $this->userInput = $updatedInput;
        return $this->userInput;
    }
    public function clearUserInput()
    {
        $this->userInput['kana']= '';
        $this->userInput['meanings']= '';
    }
    public function saveGame()
    {
        // $game = auth()->user()->games()->where('id', '=', $this->id)->orderBy('updated_at', 'desc')->limit(1)->get()->first();
        // $game = auth()->user()->games()->where('id', '=', $this->id)->get()->first();
        $game = auth()->user()->games()->orderBy('updated_at', 'desc')->limit(1)->get()->first();

        $level = $game->levels()->orderBy('updated_at', 'desc')->limit(1)->get()->first();
        $level-> dictionary = $this->dictionary;
        $level->targetWord = $this->targetWord;
        $level->level=count($game->levels);
        $level->streak=$this->streak;
        $level->topStreak=$this->topStreak;
        $level->score=$this->score;
        $level->topScore=$this->topScore;
        $level->topStreak=$this->topStreak;
        $level->inputMode=$this->inputMode;
        $level->kana=$this->userInput['kana'];
        $level->meanings=$this->userInput['meanings'];
        $level->save();
    }

    public function IncreaseLevel()
    {
        $game = auth()->user()->games()->orderBy('updated_at', 'desc')->limit(1)->get()->first();

        $levels = $game->levels;
        $oldDictionaries = collect($levels)->flatMap(function ($level) {
            return unserialize($level->dictionary);
        });
        $unknownWords = Verb::whereNotIn('id', $oldDictionaries)->get();
        $newDictionary = collect([]);
        while (count($newDictionary) < 3) {
            // get new word
            $randIndex = rand(0, count($unknownWords)-1);
            $newWord = $unknownWords->splice($randIndex, 1)->first()->toArray();
            auth()->user()->learnedWords()->create(['verb_id'=>$newWord['id']]);
            $newDictionary->push(collect($newWord));
        }

        $newDictionaryIds = $newDictionary->map(function ($item) {
            return $item['id'];
        });

        return $game->levels()->create(['dictionary'=>serialize($newDictionaryIds->toArray())]);
        # code...
    }
}
