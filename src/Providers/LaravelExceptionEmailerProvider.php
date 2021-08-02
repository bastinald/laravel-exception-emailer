<?php

namespace Bastinald\LaravelExceptionEmailer\Providers;

use Illuminate\Support\ServiceProvider;

class LaravelExceptionEmailerProvider extends ServiceProvider
{
    public function boot()
    {
        $this->publishes(
            [__DIR__ . '/../../config/laravel-exception-emailer.php' => config_path('laravel-exception-emailer.php')],
            ['laravel-exception-emailer', 'laravel-exception-emailer:config']
        );
    }

    public function register()
    {
        $this->mergeConfigFrom(__DIR__ . '/../../config/laravel-exception-emailer.php', 'laravel-exception-emailer');
    }
}
