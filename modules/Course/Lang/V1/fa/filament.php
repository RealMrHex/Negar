<?php

use Modules\Course\Entities\V1\Course\CourseFields;
use Modules\Course\Entities\V1\CourseUser\CourseUserFields;
use Modules\Episode\Entities\V1\Episode\EpisodeFields;

return [
    'global' => [
        'placeholder'    => ':key را وارد کنید',
        'not_entered'    => 'ثبت نشده',
        'unknown'        => 'نامشخص',
        'user'           => 'کاربر',
        'commission'     => 'سهم از درامد',
        'percent'        => 'درصد',
        'under_cover_of' => 'به تدریس',
        'new_episode'    => 'جلسه جدید',
    ],

    'resource' => [
        'course' => [
            'singular' => 'دوره',
            'plural'   => 'دوره‌ ها',
        ],
    ],

    'course' => [
        'episode' => [
            'tabs' => [
                'content'        => 'محتوا',
                'video_config'   => 'تنظیمات ویدیو',
                'episode_config' => 'تنظیمات جلسه',
            ],
        ],

        'tabs' => [
            'base'         => 'پایه',
            'pricing'      => 'مالی',
            'registration' => 'ثبت‌نام',
            'config'       => 'تنظیمات',
            'episodes'     => 'جلسات',
            'users'        => 'کاربران',
        ],

        'section' => [
            'access' => [
                'title'       => 'نحوه دسترسی به دوره',
                'description' => 'مشخص کنید که در چه شرایطی امکان دسترسی به دوره وجود دارد',
            ],

            'hold' => [
                'title'       => 'نحوه برگزاری دوره',
                'description' => 'روش های برگزاری دوره را مشخص کنید',
            ],

            'sale' => [
                'title'       => 'نحوه فروش دوره',
                'description' => 'تنظیمات مرتبط با فروش دوره و خرید به صورت نقدی و اقساطی',
            ],
        ],

        'add_new_user'    => 'افزودن کاربر جدید',
        'add_new_episode' => 'افزودن جلسه جدید',

        EpisodeFields::TEACHER_ID => [
            'label'       => 'مدرس جلسه',
            'placeholder' => 'مدرس جلسه را انتخاب کنید',
        ],

        EpisodeFields::ATTACHMENT => [
            'label'       => 'پیوست',
            'placeholder' => '',
        ],

        EpisodeFields::DESCRIPTION => [
            'label'       => 'توضیحات',
            'placeholder' => '',
        ],

        EpisodeFields::VIDEO_CONFIG => [
            'label'       => 'تنظیمات ویدیو',
            'placeholder' => '',
        ],

        EpisodeFields::PUBLISHED_AT => [
            'label'       => 'زمان انتشار اولیه',
            'placeholder' => 'زمان انتشار اولیه',
        ],

        EpisodeFields::SUBSCRIPTION_ACCESSED_AT => [
            'label'       => 'زمان دسترسی کاربران اشتراکی',
            'placeholder' => 'زمان دسترسی کاربران اشتراکی',
        ],

        EpisodeFields::PAID_ACCESSED_AT => [
            'label'       => 'زمان دسترسی خریداران',
            'placeholder' => 'زمان دسترسی خریداران',
        ],

        EpisodeFields::INSTALLMENT_ACCESSED_AT => [
            'label'       => 'زمان دسترسی خریداران اقساطی',
            'placeholder' => 'زمان دسترسی خریداران اقساطی',
        ],

        EpisodeFields::IS_ACCESSIBLE => [
            'label'       => 'در دسترس',
            'placeholder' => '',
        ],

        CourseUserFields::USER_ID => [
            'label'       => 'کاربر مربوطه',
            'placeholder' => 'کاربر مربوطه را انتخاب کنید',
        ],

        CourseUserFields::COMMISSION => [
            'label'       => 'سهم از درامد',
            'placeholder' => '',
        ],

        CourseUserFields::ROLE => [
            'label'       => 'نقش',
            'placeholder' => 'نقش کاربر را انتخاب کنید',
        ],

        CourseFields::ID => [
            'label' => 'شناسه',
        ],

        CourseFields::SLUG => [
            'label'       => 'نامک',
            'placeholder' => '',
        ],

        CourseFields::TITLE => [
            'label'       => 'عنوان',
            'placeholder' => '',
        ],

        CourseFields::PRICE => [
            'label'       => 'قیمت',
            'placeholder' => '',
        ],

        CourseFields::OFF_PRICE => [
            'label'       => 'قیمت با تخفیف',
            'placeholder' => '',
        ],

        CourseFields::INSTALLMENT_PRICE => [
            'label'       => 'قیمت اقساطی',
            'placeholder' => '',
        ],

        CourseFields::DURATION => [
            'label'       => 'مدت زمان',
            'placeholder' => '',
        ],

        CourseFields::COVER => [
            'label'       => 'تصویر پیش‌نمایش',
            'placeholder' => '',
        ],

        CourseFields::SHORT_DESCRIPTION => [
            'label'       => 'توضیحات کوتاه',
            'placeholder' => '',
        ],

        CourseFields::LONG_DESCRIPTION => [
            'label'       => 'محتوا',
            'placeholder' => '',
        ],

        CourseFields::FREE_ACCESS => [
            'label'       => 'دسترسی رایگان',
            'placeholder' => '',
        ],

        CourseFields::CASH_ACCESS => [
            'label'       => 'دسترسی نقدی',
            'placeholder' => '',
        ],

        CourseFields::SUBSCRIPTION_ACCESS => [
            'label'       => 'دسترسی اشتراکی',
            'placeholder' => '',
        ],

        CourseFields::IS_PURCHASABLE => [
            'label'       => 'قابل خرید',
            'placeholder' => '',
        ],

        CourseFields::IS_INSTALLMENTABLE => [
            'label'       => 'قابل اقساط',
            'placeholder' => '',
        ],

        CourseFields::IS_ONLINE => [
            'label'       => 'آنلاین',
            'placeholder' => '',
        ],

        CourseFields::IS_FACE_TO_FACE => [
            'label'       => 'حضوری',
            'placeholder' => '',
        ],

        CourseFields::IS_OFFLINE => [
            'label'       => 'آفلاین',
            'placeholder' => '',
        ],

        CourseFields::MINIMUM_CAPACITY => [
            'label'       => 'حداقل ظرفیت',
            'placeholder' => '',
        ],

        CourseFields::MAXIMUM_CAPACITY => [
            'label'       => 'حداکثر ظرفیت',
            'placeholder' => '',
        ],

        CourseFields::REGISTRATION_START_DATE => [
            'label'       => 'زمان شروع ثبت‌نام',
            'placeholder' => '',
        ],

        CourseFields::REGISTRATION_END_DATE => [
            'label'       => 'زمان پایان ثبت‌نام',
            'placeholder' => '',
        ],

        CourseFields::AUTO_CANCELLATION => [
            'label'       => 'لغو خودکار',
            'placeholder' => '',
        ],

        CourseFields::STATUS => [
            'label'       => 'وضعیت',
            'placeholder' => '',
        ],

        CourseFields::CREATED_AT => [
            'label'       => 'زمان ایجاد',
            'placeholder' => '',
        ],

        CourseFields::UPDATED_AT => [
            'label'       => 'آخرین بروزرسانی',
            'placeholder' => '',
        ],
    ],
];
