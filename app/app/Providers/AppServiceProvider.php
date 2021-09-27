<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Pagination\Paginator;

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
        JsonResource::withoutWrapping();
        Paginator::useBootstrap();

        foreach(config('containers.bind', []) as $abstract => $contrete)
        {
            $this->app->bind($abstract, $contrete);
        }

        foreach(config('containers.observers', []) as $model => $observer)
        {
            $model::observe($observer);
        }

    }
}
