<?php

namespace Modules\User\Entities\V1\User;

use Filament\Panel;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Modules\User\Enums\V1\AccountType\AccountType;
use Modules\UserProfile\Entities\V1\UserProfile\UserProfileFields;

trait UserModifiers
{
    /**
     * Get the user's name
     *
     * @return Attribute
     */
    public function name(): Attribute
    {
        return Attribute::make(
            get: fn() => $this->{UserFields::REL_PROFILE}->{UserProfileFields::FULL_NAME} ?? __('Unknown User')
        );
    }

    /**
     * Can user access the panel or not
     *
     * @param Panel $panel
     *
     * @return bool
     */
    public function canAccessPanel(Panel $panel): bool
    {
        return (
            ($panel->getId() === 'manager')
            &&
            (auth()->user()->{UserFields::ACCOUNT_TYPE} === AccountType::Manager)
        );
    }
}
