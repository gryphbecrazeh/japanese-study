<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LearnedWord extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'verb_id',
        'user_id',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
    ];
    public function increaseTimesRight()
    {
        $this->timesRight++;
        if ($this->timesRight > ($this->timesWrong + env('WORD_DIFFICULTY'))) {
            $this->shouldKnow = true;
        }

        $this->save();
    }
    public function increaseTimesWrong()
    {
        $this->timesWrong++;
        if ($this->timesRight < ($this->timesWrong + env('WORD_DIFFICULTY'))) {
            $this->shouldKnow = false;
        }
        $this->save();
    }
    public function getVerbObject()
    {
        $verbObject = Verb::where('id', '=', $this->verb_id)->limit(1)->get()->first();
        $verbObject->kanji = unserialize($verbObject->kanji);
        $verbObject->meanings = unserialize($verbObject->meanings);
        $verbObject->timesRight = $this->timesRight;
        $verbObject->timesWrong = $this->timesWrong;

        return $verbObject;
    }
}
