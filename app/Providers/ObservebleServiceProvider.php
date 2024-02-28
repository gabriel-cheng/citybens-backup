<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models;
use App\Observers;

class ObservebleServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        Models\Blog\Posts::observe(Observers\PostObserver::class);
    }
}
