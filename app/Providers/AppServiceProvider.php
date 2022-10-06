<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use App\Models\Banner;
use App\Models\Country;
use Illuminate\Support\Facades\Cache;

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
        Schema::defaultStringLength(191);

        view()->composer(['*'], function ($view) {
            $banners= Banner::pluck('name', 'id')->toArray();
            $vc_all_banners = array("Select Banner") + $banners;
            $view->with('vc_all_banners', $vc_all_banners);

            $countries=Cache::remember('countries', '600', function () {
                return Country::all();
            });                 
            $view->with('vc_countries', $countries);
           
        });
    }
}
