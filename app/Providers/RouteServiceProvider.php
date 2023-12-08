<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * Get the home's route name
     *
     * @return string
     */
    public static function home(): string
    {
        return config('framework.route_name_home', 'home');
    }
}
