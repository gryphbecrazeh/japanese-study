<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GameController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\WordController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::prefix('/auth')->group(function () {
    Route::prefix('/login')->group(function () {
        Route::get('/', [LoginController::class, 'index'])->name('auth.login');
        Route::post('/', [LoginController::class, 'store'])->name('auth.login');
    });
    Route::prefix('/register')->group(function () {
        Route::get('/', [RegisterController::class, 'index'])->name('auth.register');
        Route::post('/', [RegisterController::class, 'store'])->name('auth.register');
    });
});


/**
 *
 * Protect / Authenticate these routes
 * --------------------------------------------------------------------------
 */
Route::middleware(['auth'])->group(function () {
    Route::prefix('/dashboard')->group(function () {
        Route::get('/', [DashboardController::class, 'index'])->name('dashboard'); // USER DASHBOARD, SEE PROGRESS OVER TIME, WORD OF THE DAY, TOP SCORE, PLAYER LEVEL?, KNOWN WORD LIST
    });

    Route::prefix('/Admin')->group(function () {
        Route::prefix('/manager')->group(function () {
            Route::get('/user', [UserController::class, 'index'])->name('admin.manager.user'); // MANAGE ALL USERS IN THE SYSTEM
            Route::get('/word', [WordController::class, 'index'])->name('admin.manager.word'); // MANAGE ALL WORDS IN THE SYSTEM
            Route::post('/word', [WordController::class, 'store'])->name('admin.manager.word.update'); // MANAGE ALL WORDS IN THE SYSTEM
        });
    });

    Route::prefix('/game')->group(function () {
        Route::get('/', [GameController::class, 'index'])->name('game'); // GAME DASHBOARD, SCROLL THROUGH AVAILABLE GAMES
    Route::get('/{game_type}', [GameController::class, 'index'])->name('game.verb.start'); // VERB OFFER NEW GAME OR CONTINUE GAME PRACTICE VERBS
    Route::get('/{game_type}/{game_id}', [GameController::class, 'index'])->name('game.verb.continue'); // VERB OFFER NEW GAME OR CONTINUE GAME PRACTICE VERBS
    Route::post('/{game_type}/{game_id}', [GameController::class, 'store'])->name('game.verb.post'); // VERB OFFER NEW GAME OR CONTINUE GAME PRACTICE VERBS
    });

    Route::prefix('/user')->group(function () {
        Route::get('/', [UserController::class, 'index'])->name('user');
        Route::get('/profile', [UserController::class, 'index'])->name('user.profile'); // GET USER PROFILE DATA ( PERSONAL INFO, NAME, DATE OF BIRTH, RACE, NATIONALITY, GENDER )
    Route::get('/account', [UserController::class, 'index'])->name('user.account'); // GET USER ACCOUNT DATA ( ACCOUNT INFO, USERNAME, EMAIL, PASSWORD )
    Route::get('/support', [UserController::class, 'index'])->name('user.support'); // FOR REPORTING PROBLEMS, COMMENTS
    Route::post('/logout', [UserController::class, 'exit'])->name('user.logout'); // DEAUTH USER
    });
});
// This is in the wrong place
// Route::prefix('/api')->group(function () {
//     Route::prefix('/word')->group(function () {
//         Route::get('/word', [WordController::class, 'index'])->name('api.word'); // GET NEW WORD, UPDATE WORD GLOBAL STATS
//         Route::put('/word/{word_id}', [WordController::class, 'index'])->name('api.word'); // UPDATE WORDS GLOBAL STATS
//     });
//     Route::prefix('/user')->group(function () {
//         Route::put('/user/{user_id}', [UserController::class, 'index'])->name('api.user'); // UPDATE USER STATS
//     });
//     Route::prefix('/game')->group(function () {
//         Route::get('/game/{user_id}', [GameController::class, 'index'])->name('api.user'); // LOAD OLD GAME, CREATE NEW GAME
//         Route::put('/game/{user_id}', [GameController::class, 'index'])->name('api.user'); // UPDATE ACTIVE GAME, LEVEL, TOP SCORE, TOP STREAK
//     });
// });

Route::get('/', function () {
    return view('home');
})->name('home');
