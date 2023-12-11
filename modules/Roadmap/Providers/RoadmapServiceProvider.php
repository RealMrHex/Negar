<?php

namespace Modules\Roadmap\Providers;

use Illuminate\Support\ServiceProvider;

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
        // No code is better than no code.
    }
}
