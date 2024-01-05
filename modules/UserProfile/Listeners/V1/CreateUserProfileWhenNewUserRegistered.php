<?php

namespace Modules\UserProfile\Listeners\V1;

use Illuminate\Database\Eloquent\Model;
use Modules\Base\Listeners\V1\BaseListener\BaseListener;
use Modules\User\Entities\V1\User\UserFields;
use Modules\UserProfile\Entities\V1\UserProfile\UserProfileFields;

class CreateUserProfileWhenNewUserRegistered extends BaseListener
{
    /**
     * Handle the event
     *
     * @param Model $record
     *
     * @return void
     */
    public function handle(Model $record): void
    {
        v1_user_profile()->create(
            [
                UserProfileFields::USER_ID => $record->{UserFields::ID},
            ]
        );
    }
}
