<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserController extends Controller
{
    //
    public function index()
    {
    }
    public function store()
    {
    }
    public function exit()
    {
        auth()->logout();
        return redirect()->route('home');
    }
}
