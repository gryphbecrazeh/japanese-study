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
}
