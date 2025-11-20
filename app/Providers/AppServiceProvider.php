<?php

namespace App\Providers;

use App\Models\Portfolio;
use App\Models\Service;
use App\Models\SiteConfiguration;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        $config = SiteConfiguration::first();
        View::share('config', $config);

        $services = Service::all();
        View::share('services', $services);

        $portfolios = Portfolio::all();
        View::share('portfolios', $portfolios);

    }
}
