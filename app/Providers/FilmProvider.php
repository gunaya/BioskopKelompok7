<?php

namespace App\Providers;

use App\Film;
use Illuminate\Support\ServiceProvider;

class FilmProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        public function boot()
    {
        view()->composer('*',function($view){
            $view->with('film_array', Film::all());
        });
    }
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
