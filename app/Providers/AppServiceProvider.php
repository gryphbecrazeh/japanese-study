<?php

namespace App\Providers;

// use App\Game\Game;
use App\Models\Verb;
use App\Models\Level;
use App\View\Components\Game;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
        $this->app->singleton(Game::class, function ($app) {
            return new Game();
        });
    }
}
