<?php

namespace App\Http\Controllers;

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
        $strugglingWords = auth()->user()->learnedWords()->limit(5)->orderBy('timesWrong', 'desc')->get()->filter(function ($word) {
            return $word->timesWrong;
        })->map(function ($word) {
            return $word->getVerbObject();
        });
        
        return view('dashboard', ['strugglingWords'=>$strugglingWords]);
    }
}
