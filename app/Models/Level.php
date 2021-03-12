<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Level extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable
     *
     * @var array
     */
    protected $fillable = [
        'dictionary'
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
        $this->save;
    }
    public function setTopStreak()
    {
        $this->topStreak = $this->streak;
        $this->save;
    }
    public function increaseScore($int = 1)
    {
        $this->score+=$int;
        if ($this->score > $this->topScore) {
            $this->setTopScore();
        }
        $this->save;
    }
    public function resetScore()
    {
        $this->score = 0;
        $this->save;
    }
    public function increaseStreak()
    {
        $this->streak++;
        $this->save;
        if ($this->streak > $this->topStreak) {
            $this->setTopStreak();
        }
    }
    public function resetStreak()
    {
        $this->streak=0;
        $this->save;
    }
    public function setTargetWord($verb)
    {
        $this->targetWord = $verb->verb_id;
        $this->save();
    }
    public function setInputMode($mode)
    {
        $this->inputMode = $mode;
        $this->save();
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
        dd($this);
    }
    public function increaseLevel()
    {
        dd($this);
    }
}
