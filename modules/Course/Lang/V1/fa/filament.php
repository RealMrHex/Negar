<?php

use Modules\Course\Entities\V1\Course\CourseFields;
use Modules\Course\Entities\V1\CourseUser\CourseUserFields;

return [
    'global' => [
        'placeholder' => ':key را وارد کنید',
        'not_entered' => 'ثبت نشده',
        'unknown'     => 'نامشخص',
        'user'        => 'کاربر',
        'commission'  => 'سهم از درامد',
        'percent'     => 'درصد',
    ],

    'resource' => [
        'course' => [
            'singular' => 'دوره',
            'plural'   => 'دوره‌ ها',
        ],
    ],

    'course' => [
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

        'add_new_user' => 'افزودن کاربر جدید',

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
    ],
];
