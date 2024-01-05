<?php

namespace Modules\UserProfile\Providers;

use Modules\Base\Providers\V1\BaseEventServiceProvider\BaseEventServiceProvider;
use Modules\Support\Enums\V1\SystemEvent\SystemEvent;
use Modules\UserProfile\Listeners\V1\CreateUserProfileWhenNewUserRegistered;

class UserProfileEventServiceProvider extends BaseEventServiceProvider
{
    /**
     * The event handler mappings for the application.
     *
     * @var array<string, array<int, string>>
     */
    protected $listen = [
        SystemEvent::NewUserRegistered->value => [
            CreateUserProfileWhenNewUserRegistered::class,
        ],
    ];
}
