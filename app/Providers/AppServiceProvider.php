<?php

namespace App\Providers;

use Illuminate\Support\Facades\URL;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application service
     *
     * @return void
     */
    public function boot(): void
    {
        URL::forceRootUrl(config('app.url'));
        if (str_contains(config('app.url'), 'https://'))
        {
            URL::forceScheme('https');
            request()->server->set('HTTPS', request()->header('X-Forwarded-Proto', 'https') == 'https' ? 'on' : 'off');
        }
    }
}
