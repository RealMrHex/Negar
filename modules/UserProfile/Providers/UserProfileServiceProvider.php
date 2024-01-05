<?php

namespace Modules\UserProfile\Providers;

use Illuminate\Support\ServiceProvider;
use Modules\UserProfile\Contracts\V1\UserProfileRepository\UserProfileRepository;
use Modules\UserProfile\Repositories\V1\UserProfileRepository\UserProfileEloquentRepository;

class UserProfileServiceProvider extends ServiceProvider
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
        $this->app->bind(UserProfileRepository::class, UserProfileEloquentRepository::class);
    }
}
