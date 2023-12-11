<?php

namespace Modules\Roadmap\Entities\V1\Roadmap;

use Modules\Base\Entities\V1\Fields\BaseFields\BaseFields;

class RoadmapFields extends BaseFields
{
    public const ID          = 'id';
    public const SLUG        = 'slug';
    public const WEIGHT      = 'weight';
    public const TITLE       = 'title';
    public const LOGO        = 'logo_url';
    public const THUMBNAIL   = 'thumbnail_url';
    public const DEMO        = 'demo_url';
    public const DESCRIPTION = 'description';
    public const STATUS      = 'status';
}
