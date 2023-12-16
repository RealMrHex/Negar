<?php

namespace Modules\Category\Entities\V1\Category;

use Modules\Base\Entities\V1\Fields\BaseFields\BaseFields;

class CategoryFields extends BaseFields
{
    public const  ID             = 'id';
    public const  PARENT_ID      = 'parent_id';
    public const  SLUG           = 'slug';
    public const  WEIGHT         = 'weight';
    public const  TITLE          = 'title';
    public const  COVER          = 'cover_url';
    public const  SOCIAL_PREVIEW = 'social_image_url';
    public const  DESCRIPTION    = 'description';
    public const  CONTENT        = 'content';
    public const  STATUS         = 'status';

}
