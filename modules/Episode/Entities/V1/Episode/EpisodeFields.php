<?php

namespace Modules\Episode\Entities\V1\Episode;

use Modules\Base\Entities\V1\Fields\BaseFields\BaseFields;

class EpisodeFields extends BaseFields
{
    public const ID                       = 'id';
    public const TEACHER_ID               = 'teacher_id';
    public const SEASON_ID                = 'season_id';
    public const WEIGHT                   = 'weight';
    public const ATTACHMENT               = 'attachment_url';
    public const TITLE                    = 'title';
    public const DESCRIPTION              = 'description';
    public const DURATION                 = 'duration';
    public const VIDEO_CONFIG             = 'video_config';
    public const PUBLISHED_AT             = 'publish_at';
    public const SUBSCRIPTION_ACCESSED_AT = 'subscription_accessed_at';
    public const PAID_ACCESSED_AT         = 'paid_accessed_at';
    public const INSTALLMENT_ACCESSED_AT  = 'installment_accessed_at';
    public const FREE_ACCESS              = 'free_access';
    public const IS_ACCESSIBLE            = 'is_accessible';
}
