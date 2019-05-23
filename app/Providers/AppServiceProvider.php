<?php

namespace App\Providers;

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
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        \Illuminate\Pagination\AbstractPaginator::currentPathResolver(function () {
            /** @var \Illuminate\Routing\UrlGenerator $url */
           $url = app('url');
           return $url->current();
        });
    }
}
