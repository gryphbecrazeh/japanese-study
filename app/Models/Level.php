<?php

namespace App\Models;

use App\Models\Verb;
use Illuminate\Support\Arr;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Level extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable
     *
     * @var array
     */
    protected $fillable = [
        'dictionary',
        'streak',
        'topStreak',
        'score',
        'topScore',
        'game_id',
        'targetWord'
    ];
    /**
     * The attributes that are mass assignable
     *
     * @var array
     */
    protected $hidden = [
    ];
    /**
     * The attributes that should be cast to native types
     *
     * @var array
     */
    protected $casts = [
    ];

    public function setTopScore()
    {
        $this->topScore = $this->score;
        $this->save();
    }
    public function setTopStreak()
    {
        $this->topStreak = $this->streak;
        $this->save();
    }
    public function increaseScore($int)
    {
        $this->score+=$int;
        if ($this->score > $this->topScore) {
            $this->setTopScore();
        }
        $this->save();
    }
    public function resetScore()
    {
        $this->score = 0;
        $this->save();
    }
    public function increaseStreak()
    {
        $this->streak++;
        $this->save();
        if ($this->streak > $this->topStreak) {
            $this->setTopStreak();
        }
    }
    public function resetStreak()
    {
        $this->streak=0;
        $this->save();
    }
    public function newTargetWord()
    {
        $user = auth()->user();
        $dictionary = collect(json_decode($this->dictionary))->filter(function ($id) {
            return (integer) $id !== (integer) $this->targetWord;
        })->toArray();
        $this->setInputMode('kana');
        return $this->setTargetWord(collect(Arr::random($dictionary, 1))->first());
    }
    public function setTargetWord($id)
    {
        $this->targetWord = $id;
        $this->save();
        return $id;
    }
    public function setInputMode(string $mode)
    {
        $this->inputMode = $mode;
        $this->save();
        return $mode;
    }
    public function setUserInput($target, $value)
    {
        $updatedInput =  $this->userInput;
        $updatedInput[$target] = $value;
        $this->userInput = $updatedInput;
        $this->save();
        return $this->userInput;
    }
    public function clearUserInput()
    {
        dd($this);
    }
    public function increaseLevel()
    {
        dd($this);
    }
}
