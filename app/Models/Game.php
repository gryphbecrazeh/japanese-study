<?php

namespace App\Models;

use App\Models\Kanji;
use App\Models\Level;
use Illuminate\Support\Arr;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Game extends Model
{
    use HasFactory;

    public $game_type;
    /**
     * The attributes that are mass assignable
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'game_type'
    ];
    /**
     * The attributes that are mass assignable
     *
     * @var array
     */
    protected $hidden = [];
    /**
     * The attributes that should be cast to native types
     *
     * @var array
     */
    protected $casts = [];


    /**
     *
     * @return never
     */
    public function get_active_level(String $game_type)
    {
        $user = auth()->user();
        $levels = $this->levels()->orderBy('updated_at', 'desc')->get();
        $current_level = null;
        $learned_words = [];
        $dictionary = [];

        $learned_words = $user->learned_words()->where('game_type', '=', $game_type)->get()->toArray();

        if (!count($learned_words) > 0) {
            if ($game_type === 'verb') {
                $new_words = Verb::inRandomOrder()->limit(10)->get()->toArray();
            }
            if ($game_type === 'kanji') {
                $new_words = Kanji::inRandomOrder()->limit(10)->get()->toArray();
            }


            foreach ($new_words as $word) {
                $word['game_type'] = $game_type;
                $learned_words[] = $user->add_word($word);
            }
            // $learned_words = $user->learned_words()->where('gametype', '=', $game_type)->get()->toArray();
        }


        // If there are no levels create a level
        if (!count($levels) > 0) {
            // Fill
            // 'dictionary',
            $dictionary = Arr::random($learned_words, 10);
            $dictionary_ids = collect($dictionary)->map(function ($word) use ($game_type) {
                return $word[$game_type . '_id'];
            })->toArray();
            // 'streak',
            // 'topStreak',
            // 'score',
            // 'topScore'
            $target_word = collect(Arr::random($dictionary_ids, 1))->first();

            $current_level = Level::create(['game_id' => $this->id, 'dictionary' => \json_encode($dictionary_ids), 'targetWord' => $target_word, 'inputMode' => $game_type === 'kanji' ?  'onyomi' : 'kana']);
        }
        // Current level wasn't established already, grab the first available level,
        // add logic here to see if a new level needs to be created and a new dictionary needs to be made
        if (!$current_level) {
            $current_level = $levels->first();
            $dictionary = \json_decode($current_level->dictionary);
            if (!$current_level->targetWord) {
                $current_level = $current_level->toArray();
                $target_word = collect(Arr::random($dictionary, 1))->first();
                $current_level['targetWord'] = $target_word;
                $this->levels()->where('id', '=', $current_level['id'])->get()->first()->update($current_level);
                $current_level = $this->levels()->where('id', '=', $current_level['id'])->get()->first();
            }
        }
        return $current_level;
    }
    /**
     *
     * @return never
     */
    public function create_level()
    {
        dd($this->id);
    }
    /**
     *
     * @return HasMany
     */
    public function levels()
    {
        return  $this->hasMany(Level::class);
    }
    // Get topscore of all levels

    // Get top streak of all levels

    // increaseLevel
}
