<?php

namespace App\Http\Controllers\Admin;

use App\Models\Verb;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Route;

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
    public function store(Request $request)
    {
        $word = Verb::where('id', '=', $request['id'])->limit(1)->get()->first();
        $word->meaning = $request['meaning'];
        $word->politeForm = $request['politeForm'];
        $word->stem = $request['stem'];
        $word->verbType = $request['verbType'];
        $word->meanings = serialize(explode('ENDOFLINE', $request['meanings']));
        $kanji = [
            'word'=>$request['word'],
            'meaning'=> $request['meaning']
        ];
        $word->kanji = serialize($kanji);
        $word->save();
        # code...
        return redirect(route('admin.manager.word'));
    }
    public function report(Request $request)
    {
        $verb_id = Route::current()->parameter('verb_id');
        $verb = Verb::where('id', '=', $verb_id)->limit(1)->get()->first();
        if ($verb) {
            $verb->reportProblem();
        }
    }
}
