<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Verb;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function __construct()
    {
    }

    public function index()
    {
        $strugglingWords = auth()->user()->learned_words()->limit(5)->orderBy('timesWrong', 'desc')->get()->filter(function ($word) {
            return $word->timesWrong;
        })->map(function ($word) {
            $fetchedWord = collect($word->get_global_word_object())->toArray();
            $fetchedWord['meanings'] = \unserialize($fetchedWord['meanings']);
            $fetchedWord['kanji'] = \unserialize($fetchedWord['kanji']);

            return collect($fetchedWord);
        });

        return view('dashboard', ['strugglingWords' => $strugglingWords]);
    }
}
