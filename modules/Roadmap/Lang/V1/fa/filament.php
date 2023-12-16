<?php

use Modules\Roadmap\Entities\V1\Roadmap\RoadmapFields;

return [
    'global' => [
        'placeholder' => ':key را وارد کنید',
    ],

    'resource' => [
        'roadmap' => [
            'singular' => 'مسیر راه',
            'plural'   => 'مسیرهای راه',
        ],
    ],

    'roadmap' => [
        RoadmapFields::ID => [
            'label' => 'شناسه',
        ],

        RoadmapFields::SLUG => [
            'label'       => 'نامک',
            'placeholder' => '',
        ],

        RoadmapFields::WEIGHT => [
            'label'       => 'وزن',
            'placeholder' => '',
        ],

        RoadmapFields::TITLE => [
            'label'       => 'عنوان',
            'placeholder' => '',
        ],

        RoadmapFields::LOGO => [
            'label'       => 'نماد',
            'placeholder' => '',
        ],

        RoadmapFields::THUMBNAIL => [
            'label'       => 'تصویر پیش‌نمایش',
            'placeholder' => '',
        ],

        RoadmapFields::SOCIAL_IMAGE => [
            'label'       => 'تصویر پیش‌نمایش شبکه‌های اجتماعی',
            'placeholder' => '',
        ],

        RoadmapFields::DEMO => [
            'label'       => 'ویدیو دمو',
            'placeholder' => '',
        ],

        RoadmapFields::DESCRIPTION => [
            'label'       => 'توضیحات',
            'placeholder' => '',
        ],

        RoadmapFields::STATUS => [
            'label'       => 'وضعیت',
            'placeholder' => 'وضعیت را مشخص کنید',
        ],

        RoadmapFields::CREATED_AT => [
            'label'       => 'زمان ایجاد',
            'placeholder' => '',
        ],

        RoadmapFields::UPDATED_AT => [
            'label'       => 'زمان آخرین تغییر',
            'placeholder' => '',
        ],
    ],
];
