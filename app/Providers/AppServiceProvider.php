<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

// import Schema
use Illuminate\Support\Facades\Schema;


use Illuminate\Support\Facades\View;
use Cart;

use Illuminate\Support\Facades\Route;

//use App\Models\Shop;

use App\Models\{ Shop, Page };


  
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

        Schema::defaultStringLength(191);

        View::share('shop', Shop::firstOrFail());

        Route::resourceVerbs([
            'edit' => 'modification',
            'create' => 'creation',
        ]);
    
        View::composer(['layouts.app', 'products.show'], function ($view) {
            $view->with([
                'cartCount' => Cart::getTotalQuantity(), 
                'cartTotal' => Cart::getTotal(),
            ]);
        });

        View::share('pages', Page::all());

        View::composer('back.layout', function ($view) {
            $title = config('titles.' . Route::currentRouteName());
            $view->with(compact('title'));
        });
    }
}
