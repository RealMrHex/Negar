<?php

namespace Modules\Course\Enums\V1\CourseUserRole;

use Modules\Support\Traits\V1\CleanEnum\CleanEnum;

enum CourseUserRole: int
{
    use CleanEnum;

    case Teacher = 0;
    case Mentor  = 1;
    case Support = 2;
}
