<?php

namespace App\Models;

use App\Models\Game;
use App\Models\Verb;
use Illuminate\Support\Facades\DB;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'username'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token'
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime'
    ];
    public function games()
    {
        return $this->hasMany(Game::class, 'user_id');
    }
    public function learned_words()
    {
        return $this->hasMany(LearnedWord::class);
    }

    public function add_word(array $word)
    {
        return LearnedWord::create(['verb_id' => $word['id'], 'user_id' => $this->id]);
    }
}
