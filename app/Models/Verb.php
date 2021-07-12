<?php

namespace App\Models;

use Exception;
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
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'created_at',
        'updated_at'
    ];
    public function increaseTimesRight()
    {
        $this->timesRight++;
        $this->save();
    }
    public function increaseTimesWrong()
    {
        $this->timesWrong++;
        $this->save();
    }
    public function getId()
    {
        return $this->id;
    }
    public function reportProblem()
    {
        try {
            $this->problem = true;
            $this->save();
            return true;
        } catch (Exception $e) {
            return \json_encode($e);
        }
    }
}
