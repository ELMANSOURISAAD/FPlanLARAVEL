<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Livewire\Livewire;

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

        $measurements = array(
            "grammes",
            "kilogrammes",
            "millilitres",
            "litres",
            "cuillères à soupe",
            "cuillères à café",
            "verres",
            "tasses",
            "pincées",
            "pots",
            "tranches",
            "feuilles",
            "branches",
            "gousses",
            "noix"
        );
        $stock_measurements = array(
            "grammes",
            "kilogrammes",
            "millilitres",
            "litres",
            "gousses"
        );

        Schema::defaultStringLength(191);
        // Using view composer to set following variables globally
        view()->composer('*',function($view) use ($stock_measurements, $measurements) {
            $view->with('preunits', $measurements)
                ->with('stockpreunits', $stock_measurements);

        });
    }


}
