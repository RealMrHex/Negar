<?php

namespace Modules\Course\Enums\V1\CourseStatus;

use Modules\Support\Traits\V1\CleanEnum\CleanEnum;

enum CourseStatus: int
{
    use CleanEnum;

    case Draft      = 0;
    case Presale    = 1;
    case InProgress = 2;
    case Completed  = 3;
    case SoldOut    = 4;
    case Archived   = 5;
    case Canceled   = 6;
}
