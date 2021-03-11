<?php

namespace App\View\Components;

use App\Game\Game as G;
use App\Models\LearnedWord;
use App\Models\Verb;
use Illuminate\View\Component;

class Game extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $game;
    public $targetWord;
    public function __construct()
    {
        $this->game = app(G::class);
        $this->game->loadGame();
        $targetWord = Verb::where('id', '=', $this->game->targetWord)->limit(1)->get()->first();

        $learnedWords = auth()->user()->learnedWords;

        $learnedWordIds = $learnedWords->map(function ($word) {
            return $word->verb_id;
        });

        // dd($learnedWordIds, $targetWord, $this->game);

        $targetWord->meanings = unserialize($targetWord->meanings);
        $targetWord->kanji = unserialize($targetWord->kanji);
        $targetWord->shouldKnow = LearnedWord::where('verb_id', '=', $targetWord->id)->limit(1)->get()->first()->shouldKnow;
        $this->targetWord = $targetWord;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.game', [
            'id' => $this->game->gameId,
            'dictionary' => unserialize($this->game->dictionary),
             'score' => $this->game->score,
             'streak' => $this->game->streak,
              'level' => $this->game->level,
               'topStreak' => $this->game->topStreak,
                'topScore' => $this->game->topScore,
                'targetWord' => $this->targetWord,
                'inputMode' => $this->game->inputMode
                 ]);
    }
}
