<?php

namespace Modules\Security\Providers;


use Gate;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider;
use Modules\Security\Policies\V1\RolePolicy\RolePolicy;
use Modules\User\Entities\V1\User\UserFields;
use Modules\User\Enums\V1\AccountType\AccountType;
use Spatie\Permission\Models\Role;

class SecurityAuthServiceProvider extends AuthServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        Role::class => RolePolicy::class,
    ];

    public function boot(): void
    {
        Gate::before(function ($user, $ability, $arguments) {});
        Gate::after(function ($user, $ability, $result, $arguments) {});

        // todo: refactor pulse gate. it's not belongs to here.
        Gate::define('viewPulse', function (Model $user)
        {
            return $user->{UserFields::ACCOUNT_TYPE} === AccountType::Manager;
        });
    }
}
