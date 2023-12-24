<?php

namespace Modules\Season\Entities\V1\Season;

use Modules\Base\Entities\V1\Fields\BaseFields\BaseFields;

class SeasonFields extends BaseFields
{
    public const ID         = 'id';
    public const COURSE_ID  = 'course_id';
    public const TITLE      = 'title';
    public const WEIGHT     = 'weight';
    public const STATUS     = 'status';
    public const REL_COURSE = 'course';
}
