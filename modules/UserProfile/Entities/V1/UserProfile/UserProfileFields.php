<?php

namespace Modules\UserProfile\Entities\V1\UserProfile;

use Modules\Base\Entities\V1\Fields\BaseFields\BaseFields;

class UserProfileFields extends BaseFields
{
    public const ID         = 'id';
    public const USER_ID    = 'user_id';
    public const AVATAR     = 'avatar_url';
    public const FIRST_NAME = 'first_name';
    public const LAST_NAME  = 'last_name';
    public const FULL_NAME  = 'full_name';
    public const BIRTH_DATE = 'birth_date';
    public const GENDER     = 'gender';
    public const REL_USER   = 'user';
}
