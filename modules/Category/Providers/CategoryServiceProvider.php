<?php

namespace Modules\Category\Providers;

use Illuminate\Support\ServiceProvider;
use Modules\Category\Contracts\V1\CategoryRepository\CategoryRepository;
use Modules\Category\Repositories\V1\CategoryRepository\CategoryEloquentRepository;

class CategoryServiceProvider extends ServiceProvider
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
        $this->app->bind(CategoryRepository::class, CategoryEloquentRepository::class);
    }
}
