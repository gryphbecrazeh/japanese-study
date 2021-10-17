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
        'game_type',
        'shouldKnow',
        'timesRight',
        'timesWrong'
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
        $this->get_global_word_object()->increaseTimesRight();
        $this->save();
    }
    public function increaseTimesWrong()
    {
        $this->timesWrong++;
        if ($this->timesRight < ($this->timesWrong + env('WORD_DIFFICULTY'))) {
            $this->shouldKnow = false;
        }
        $this->get_global_word_object()->increaseTimesWrong();
        $this->save();
    }
    public function get_global_word_object()
    {
        $word_model = null;
        $word_id = null;
        switch ($this->game_type) {
            case 'kanji':
                $word_model = Kanji::class;
                $word_id = 'kanji_id';
                break;
            case 'verb':
                $word_model = Verb::class;
                $word_id = 'verb_id';
                break;
        }
        return $word_model::where('id', '=', $this[$word_id])->limit(1)->get()->first();
    }

    public function get_assembled_word()
    {
        $word = collect($this->get_global_word_object())->toArray();
        $word['game_types'] = $this->game_type;
        $word['shouldKnow'] = $this->shouldKnow;
        $word['timesRight'] = $this->timesRight;
        $word['timesWrong'] = $this->timesWrong;

        $word['meanings'] = \unserialize($word['meanings']);

        switch ($this->game_type) {
            case 'kanji':
                $word['kunyomi'] = \unserialize($word['kunyomi']);
                $word['onyomi'] = \unserialize($word['onyomi']);
                break;
            case 'verb':
                $word['kanji'] = \unserialize($word['kanji']);
                break;
        }
        return $word;
    }
}
