<?php
namespace App\Game;

use App\Models\Verb;
use App\Models\Level;
use Illuminate\Support\Facades\DB;

class Game
{
    /**
    * Create a new component instance.
    *
    * @return void
    */
    public $gameId;
    public $inputMode;
    public $targetWord;
    public $userTargetWord;
    public $dictionary = [];
    public $score = 0;
    public $level = 0;
    public $highestStreak = 0;
    public $topScore = 0;
    public $shouldKnow = false;

    public function __construct()
    {
        $learnedWords = collect(auth()->user()->learnedWords);

        $learnedDictionary = $learnedWords->map(function ($word) {
            return $word->verb_id;
        })->toArray();
        $game = null;

        $games = auth()->user()->games;

        if (!count($learnedDictionary) > 0) {
            $verbs = collect(DB::table('verbs')->get());// Add randomize function so that every new game doesn't return the same words, probably abstract out into an api endpoint or controller
            $verbs->splice(3);
            $learnedDictionary = $verbs->flatmap(function ($word) {
                auth()->user()->learnedWords()->create(['verb_id'=>$word->id]);
                return $word->id;
            })->toArray();
        }

        // If there are no previous games, create a new game and level, and apply the dictionary
        if (!count($games)>=1) {
            $level_dictionary = collect($learnedDictionary)->flatMap(function ($id) {
                return Verb::where('id', '=', $id)->get();
            });
            $game_dictionary = collect($learnedDictionary)->flatMap(function ($id) {
                $word = Verb::where('id', '=', $id)->limit(1)->get();
                return $word;
            });
            auth()->user()->games()->create()->levels()->create(['dictionary'=>serialize($learnedDictionary)]);
        }

        $game = auth()->user()->games()->orderBy('updated_at', 'desc')->limit(1)->get()->first();
        $game = $game->levels()->orderBy('updated_at', 'desc')->limit(1)->get()->first();

        if (is_null($game)) {
            return 'Not Found...';
        }
        $level_dictionary = unserialize($game->dictionary);
        $level_dictionary = collect($level_dictionary)->flatmap(function ($id) {
            return Verb::where('id', '=', $id)->limit(1)->get();
        });
        $game->dictionary = $level_dictionary;
        $dictionary = collect($game['dictionary'])->map(function ($word) {
            $word->meanings = [...unserialize($word->meanings)];
            $word->kanji = unserialize($word->kanji);
            return $word;
        });
        $this->targetWord = $game['targetWord'] ?? $learnedDictionary[array_rand($learnedDictionary, 1)];
        $this->userTargetWord = auth()->user()->learnedWords()->where('verb_id', '=', $this->targetWord)->limit(1)->get()->first();
        $this->gameId = $game['id'];
        $this->dictionary = $game['dictionary'];
        $this->score = $game['score'];
        $this->level = $game['level'];
        $this->highestStreak = $game['highestStreak'];
        $this->topScore = $game['topScore'];
        $this->shouldKnow = false;
        $this->modes = ['politeForm'];
        $this->inputMode = $game['inputMode'] ?? 'kana';
        $this->userInput = [
            'kana' => $game['kana'] ?? '',
            'meanings' =>$game['meanings'] ?? ''
        ];
    }

    public function setUserInput($target, $value)
    {
        $updatedInput =  $this->userInput;
        $updatedInput[$target] = $value;
        $this->userInput = $updatedInput;
        return $this->userInput;
    }
    public function setInputMode($mode)
    {
        $this->inputMode = $mode;
    }
    public function saveGame()
    {
        $game = auth()->user()->games()->where('id', '=', $this->gameId)->orderBy('updated_at', 'desc')->limit(1)->get()->first();
        $game = $game->levels()->orderBy('updated_at', 'desc')->limit(1)->get()->first();
        $game->targetWord = $this->targetWord;
        $game->userTargetWord=$this->userTargetWord;
        $game->score=$this->score;
        $game->level=$this->level;
        $game->highestStreak=$this->highestStreak;
        $game->topScore=$this->topScore;
        $game->inputMode=$this->inputMode;
        $game->kana=$this->userInput['kana'];
        $game->meanings=$this->userInput['meanings'];
        $game->save();
    }
}
