<?php

namespace App\Http\Controllers;

use App\Models\Verb;
use Illuminate\Http\Request;

class WordController extends Controller
{
    //
    public function index()
    {
        $verbs = Verb::orderBy('verbType', 'desc')->get();

        // 1 => "lastUpdated"
        // 2 => "meaning"
        // 3 => "politeForm"
        // 4 => "verbType"
        // 5 => "timesWrong"
        // 6 => "timesRight"
        // 7 => "stem"
        // 8 => "meanings"
        // 9 => "kanji"
        $IGNORE_KEYS = collect([
            'id',
            'meanings',
            'kanji'
        ]);

        $keys = array_keys($verbs->first()->toArray());

        $keys = collect($keys)->filter(function ($item) use ($IGNORE_KEYS) {
            return ! collect($IGNORE_KEYS)->contains($item);
        });

        return view('word', ['verbs'=>$verbs, 'keys'=>$keys]);
    }
}
