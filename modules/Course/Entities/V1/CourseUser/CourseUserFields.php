<?php

namespace Modules\Course\Entities\V1\CourseUser;

use Modules\Base\Entities\V1\Fields\BaseFields\BaseFields;

class CourseUserFields extends BaseFields
{
    public const ID         = 'id';
    public const COURSE_ID  = 'course_id';
    public const USER_ID    = 'user_id';
    public const COMMISSION = 'commission';
    public const ROLE       = 'role';
    public const WEIGHT     = 'weight';

    public const REL_COURSE = 'course';
    public const REL_USER   = 'user';
}
