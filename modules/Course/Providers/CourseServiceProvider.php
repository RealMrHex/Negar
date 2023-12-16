<?php

namespace Modules\Course\Providers;

use Illuminate\Support\ServiceProvider;
use Modules\Course\Contracts\V1\CourseRepository\CourseRepository;
use Modules\Course\Repositories\V1\CourseRepository\CourseEloquentRepository;

class CourseServiceProvider extends ServiceProvider
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
        $this->app->bind(CourseRepository::class, CourseEloquentRepository::class);
    }
}
