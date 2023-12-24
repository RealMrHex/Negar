<?php

namespace Modules\Season\Providers;

use Illuminate\Support\ServiceProvider;
use Modules\Season\Contracts\V1\SeasonRepository\SeasonRepository;
use Modules\Season\Repositories\V1\SeasonRepository\SeasonEloquentRepository;

class SeasonServiceProvider extends ServiceProvider
{
    /**
     * Boot the application events.
     *
     * @return void
     */
    public function boot(): void
    {
       $this->registerRepositories();
    }

    /**
     * Register module repositories.
     *
     * @return void
     */
    private function registerRepositories(): void
    {
        $this->app->bind(SeasonRepository::class, SeasonEloquentRepository::class);
    }
}
