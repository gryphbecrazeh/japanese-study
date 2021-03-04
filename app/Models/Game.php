<?php

namespace App\Models;

use App\Models\Level;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Game extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable
     *
     * @var array
     */
    protected $fillable = [
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

    public function levels()
    {
        return  $this->hasMany(Level::class);
    }
    // Get topscore of all levels
   
    // Get top streak of all levels

    // increaseLevel
}
