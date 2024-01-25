<?php

namespace App\Providers;

use App\Repositories\Contracts\CountryLocalizationRepositoryInterface;
use App\Repositories\Contracts\CountryRepositoryInterface;
use App\Repositories\CountryLocalizationRepository;
use App\Repositories\CountryRepository;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(CountryRepositoryInterface::class, CountryRepository::class);
        $this->app->bind(CountryLocalizationRepositoryInterface::class, CountryLocalizationRepository::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);
    }
}
