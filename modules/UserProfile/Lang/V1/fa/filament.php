<?php

use Modules\User\Entities\V1\User\UserFields;
use Modules\UserProfile\Entities\V1\UserProfile\UserProfileFields;

return [
    'global' => [
        'placeholder' => ':key را وارد کنید',
        'not_entered' => 'ثبت نشده',
    ],

    'resource' => [
        'user_profile' => [
            'singular' => 'پروفایل کاربر',
            'plural'   => 'پروفایل کاربران',
        ],
    ],

    'user_profile' => [
        UserProfileFields::REL_USER => [
            UserFields::EMAIL => [
                'label'       => 'پست الکترونیک کاربر',
                'placeholder' => '',
            ],

            UserFields::MOBILE => [
                'label'       => 'تلفن همراه کاربر',
                'placeholder' => '',
            ],
        ],

        UserProfileFields::ID => [
            'label' => 'شناسه',
        ],

        UserProfileFields::AVATAR => [
            'label'       => 'تصویر پروفایل',
            'placeholder' => '',
        ],

        UserProfileFields::FIRST_NAME => [
            'label'       => 'نام',
            'placeholder' => '',
        ],

        UserProfileFields::LAST_NAME => [
            'label'       => 'نام‌خانوادگی',
            'placeholder' => '',
        ],

        UserProfileFields::FULL_NAME => [
            'label'       => 'نام و نام‌خانوادگی',
            'placeholder' => '',
        ],

        UserProfileFields::BIRTH_DATE => [
            'label'       => 'تاریخ تولد',
            'placeholder' => 'تاریخ تولد خود را انتخاب کنید',
        ],

        UserProfileFields::GENDER => [
            'label'       => 'جنسیت',
            'placeholder' => 'جنسیت خود را انتخاب کنید',
        ],

        UserFields::CREATED_AT => [
            'label'       => 'زمان ایجاد',
            'placeholder' => '',
        ],

        UserFields::UPDATED_AT => [
            'label'       => 'زمان آخرین تغییر',
            'placeholder' => '',
        ],
    ],
];
