<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Game extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $gameId;
    public $targetWord;
    public $userTargetWord;
    public $dictionary = [];
    public $score = 0;
    public $level = 0;
    public $highestStreak = 0;
    public $topScore = 0;
    public $shouldKnow = false;
    public function __construct($game)
    {
        $dictionary = collect($game['dictionary'])->map(function ($word) {
            $word->meanings = [...unserialize($word->meanings)];
            $word->kanji = unserialize($word->kanji);
            return $word;
        });
        $this->targetWord = $dictionary[array_rand($dictionary->toArray(), 1)];
        $this->userTargetWord = auth()->user()->learnedWords()->where('verb_id', '=', $this->targetWord->id)->limit(1)->get()->first();
        $this->gameId = $game['id'];
        $this->dictionary = $game['dictionary'];
        $this->score = $game['score'];
        $this->level = $game['level'];
        $this->highestStreak = $game['highestStreak'];
        $this->topScore = $game['topScore'];
        $this->shouldKnow = false;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.game', [
            'id' => $this->gameId,
            'dictionary' => $this->dictionary,
             'score' => $this->score,
              'level' => $this->level,
               'highestStreak' => $this->highestStreak,
                'topScore' => $this->topScore,
                'targetWord' => $this->targetWord,
                'userTargetWord' => $this->userTargetWord,
                'targetMode' => 'politeForm'
                 ]);
    }
}
