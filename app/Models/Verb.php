<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Verb extends Model
{
    use HasFactory;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'meaning',
        'politeForm',
        'verbType',
        'stem',
        'meanings', // Serialized Array
        'kanji' // Serialized Associative Array
    ];
}
