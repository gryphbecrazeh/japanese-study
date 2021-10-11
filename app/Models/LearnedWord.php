<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

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
        'kanji_id',
        'user_id',
        'game_type'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [];
    public function users()
    {
        return $this->belongsToMany(User::class);
    }
    public function increaseTimesRight()
    {
        $this->timesRight++;
        if ($this->timesRight > ($this->timesWrong + env('WORD_DIFFICULTY'))) {
            $this->shouldKnow = true;
        }
        $this->getVerbObject()->increaseTimesRight();
        $this->save();
    }
    public function increaseTimesWrong()
    {
        $this->timesWrong++;
        if ($this->timesRight < ($this->timesWrong + env('WORD_DIFFICULTY'))) {
            $this->shouldKnow = false;
        }
        $this->getVerbObject()->increaseTimesWrong();
        $this->save();
    }
    public function getVerbObject()
    {
        $verbObject = Verb::where('id', '=', $this->verb_id)->limit(1)->get()->first();
        return $verbObject;
    }
}
