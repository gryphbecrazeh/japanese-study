<?php

namespace App\View\Components;

use App\Game\Game as G;
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
        // dd($this->game);
        $targetWord = Verb::where('id', '=', $this->game->targetWord)->limit(1)->get()->first();
        $targetWord->meanings = unserialize($targetWord->meanings);
        $targetWord->kanji = unserialize($targetWord->kanji);
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
            'dictionary' => $this->game->dictionary,
             'score' => $this->game->score,
              'level' => $this->game->level,
               'highestStreak' => $this->game->highestStreak,
                'topScore' => $this->game->topScore,
                'targetWord' => $this->targetWord,
                'userTargetWord' => $this->game->userTargetWord,
                'inputMode' => $this->game->inputMode
                 ]);
    }
}
