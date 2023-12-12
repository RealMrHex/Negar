<?php

namespace Modules\Course\Entities\V1\Course;

use Modules\Base\Entities\V1\Fields\BaseFields\BaseFields;

class CourseFields extends BaseFields
{
    public const ID                      = 'id';
    public const PRIMARY_CATEGORY_ID     = 'primary_category_id';     // course primary category (from categories table)
    public const PRIMARY_TEACHER_ID      = 'primary_teacher_id';      // course primary teacher (from users table)
    public const TITLE                   = 'title';                   // course title
    public const PRICE                   = 'price';                   // pure price
    public const OFF_PRICE               = 'off_price';               // off price - will not affect the installments
    public const INSTALLMENT_PRICE       = 'installment_price';       // installment price
    public const DURATION                = 'duration';                // course duration in HH:MM:SS format aka (H:i:s)
    public const COVER                   = 'cover_url';               // course cover image
    public const SHORT_DESCRIPTION       = 'short_description';       // course short description that usually use in the cards
    public const LONG_DESCRIPTION        = 'long_description';        // course long description that usually use in the course page
    public const FREE_ACCESS             = 'free_access';             // course is freely accessible
    public const CASH_ACCESS             = 'cash_access';             // course is accessible for users who purchased it
    public const SUBSCRIPTION_ACCESS     = 'subscription_access';     // course is accessible for users who have specified subscription(s)
    public const IS_PURCHASABLE          = 'is_purchasable';          // course is available to purchase
    public const IS_INSTALLMENTABLE      = 'is_installmentable';      // course is available to installment
    public const IS_ONLINE               = 'is_online';               // course is online
    public const IS_FACE_TO_FACE         = 'is_face_to_face';         // course is face-to-face
    public const IS_OFFLINE              = 'is_offline';              // course is offline
    public const MINIMUM_CAPACITY        = 'minimum_capacity';        // course minimum capacity
    public const MAXIMUM_CAPACITY        = 'maximum_capacity';        // course maximum capacity
    public const REGISTRATION_START_DATE = 'registration_start_date'; // date that course is available for registration
    public const REGISTRATION_END_DATE   = 'registration_end_date';   // date that course is not accept new registration anymore
    public const AUTO_CANCELLATION       = 'auto_cancellation';       // auto cancellation ability for course that does not reach the minimum capacity
    public const STATUS                  = 'status';                  // course status, e.g: 'coming-soon', 'pre-sale', 'in-progress', etc.
}
