<?php

namespace App\Providers;

use App\Services\GeoCodingRestApiEngine\GeoCodingRestApiEngine;
use App\Services\GeoCodingRestApiEngine\GeocodingRestApiEngineinterface;
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
        $this->app->singleton(GeoCodingRestApiEngineinterface::class, function () {
            return new GeoCodingRestApiEngine
            (
             'https://maps.googleapis.com/maps/api/geocode/',
             'json',
             'AIzaSyDFCFhb1JgbGK5dbwdAcJbYE4rpnbDDRDI'
            );
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
