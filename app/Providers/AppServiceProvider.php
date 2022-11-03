<?php

namespace App\Providers;
use App\Models\{Review, CarGeneration, CarMake, CarModel};

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use Illuminate\Routing\Router;
use Illuminate\Support\Facades\Route;

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
        /* Fetch makes for make-select dropdown  */
        View::composer(['index', 'cars.index', 'reviews.index', 'inc.manufacturer-menu'], function($view){
            $view->with('makes', CarMake::get());
        });

    }
}

