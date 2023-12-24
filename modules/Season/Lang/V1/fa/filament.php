<?php

use Modules\Season\Entities\V1\Season\SeasonFields;

return [
    'global' => [
        'placeholder' => ':key را وارد کنید',
        'not_entered' => 'ثبت نشده',
    ],

    'resource' => [
        'season' => [
            'singular' => 'بخش',
            'plural'   => 'بخش‌ها',
        ],
    ],

    'season' => [
        'prefix'  => 'بخش',
        'new'     => 'جدید',
        'add_new' => 'افزودن بخش جدید',

        SeasonFields::TITLE => [
            'label'       => 'عنوان',
            'placeholder' => '',
        ],

        SeasonFields::WEIGHT => [
            'label'       => 'وزن',
            'placeholder' => '',
        ],

        SeasonFields::STATUS => [
            'label'       => 'وضعیت',
            'placeholder' => '',
        ],

        SeasonFields::COURSE_ID => [
            'label'       => 'دوره مربوطه',
            'placeholder' => 'دوره مربوطه را انتخاب کنید',
        ],

        SeasonFields::REL_COURSE => [
            'label'       => 'دوره مربوطه',
            'placeholder' => 'دوره مربوطه را انتخاب کنید',
        ],
    ],
];
