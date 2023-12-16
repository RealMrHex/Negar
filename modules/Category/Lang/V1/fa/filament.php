<?php

use Modules\Category\Entities\V1\Category\CategoryFields;

return [
    'global' => [
        'placeholder' => ':key را وارد کنید',
        'not_entered' => 'ثبت نشده',
        'is_parent'   => 'والد است',
    ],

    'resource' => [
        'category' => [
            'singular' => 'دسته‌بندی',
            'plural'   => 'دسته‌بندی‌ها',
        ],
    ],

    'category' => [
        CategoryFields::ID => [
            'label' => 'شناسه',
        ],

        CategoryFields::PARENT_ID => [
            'label'       => 'دسته‌بندی والد',
            'placeholder' => 'دسته‌بندی والد را انتخاب کنید',
        ],

        CategoryFields::SLUG => [
            'label'       => 'نامک',
            'placeholder' => '',
        ],

        CategoryFields::TITLE => [
            'label'       => 'عنوان',
            'placeholder' => '',
        ],

        CategoryFields::WEIGHT => [
            'label'       => 'وزن',
            'placeholder' => '',
        ],

        CategoryFields::COVER => [
            'label'       => 'تصویر پیش‌نمایش',
            'placeholder' => '',
        ],

        CategoryFields::SOCIAL_PREVIEW => [
            'label'       => 'تصویر پیش‌نمایش شبکه‌های اجتماعی',
            'placeholder' => '',
        ],

        CategoryFields::DESCRIPTION => [
            'label'       => 'توضیحات کوتاه',
            'placeholder' => '',
        ],

        CategoryFields::CONTENT => [
            'label'       => 'محتوا',
            'placeholder' => '',
        ],

        CategoryFields::STATUS => [
            'label'       => 'وضعیت',
            'placeholder' => '',
        ],

        CategoryFields::UPDATED_AT => [
            'label'       => 'آخرین به‌روزرسانی',
            'placeholder' => '',
        ],

        CategoryFields::CREATED_AT => [
            'label'       => 'زمان ایجاد',
            'placeholder' => '',
        ],
    ],
];
