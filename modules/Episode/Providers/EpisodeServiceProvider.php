<?php

namespace Modules\Episode\Providers;

use Illuminate\Support\ServiceProvider;
use Modules\Episode\Contracts\V1\EpisodeRepository\EpisodeRepository;
use Modules\Episode\Repositories\V1\EpisodeRepository\EpisodeEloquentRepository;

class EpisodeServiceProvider extends ServiceProvider
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
        $this->app->bind(EpisodeRepository::class, EpisodeEloquentRepository::class);
    }
}
