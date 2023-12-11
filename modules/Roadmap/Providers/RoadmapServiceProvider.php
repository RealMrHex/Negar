<?php

namespace Modules\Roadmap\Providers;

use Illuminate\Support\ServiceProvider;
use Modules\Roadmap\Contracts\V1\RoadmapRepository\RoadmapRepository;
use Modules\Roadmap\Repositories\V1\RoadmapRepository\RoadmapEloquentRepository;

class RoadmapServiceProvider extends ServiceProvider
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
        $this->app->bind(RoadmapRepository::class, RoadmapEloquentRepository::class);
    }
}
