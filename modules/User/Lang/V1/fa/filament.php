<?php

use Modules\User\Entities\V1\User\UserFields;

return [
    'global' => [
        'placeholder' => ':key را وارد کنید',
        'not_entered' => 'ثبت نشده',
    ],

    'resource' => [
        'user' => [
            'singular' => 'کاربر',
            'plural'   => 'کاربران',
        ],
    ],

    'action' => [
        'user' => [
            'email_verify' => [
                'label' => 'تایید پست الکترونیک',
                'color' => 'success',

                'modal' => [
                    'icon' => 'heroicon-o-envelope',
                ],

                'notification' => [
                    'icon'    => 'heroicon-o-check-badge',
                    'content' => 'تایید پست الکترونیک با موفقیت انجام شد',
                ],
            ],

            'mobile_verify' => [
                'label' => 'تایید تلفن همراه',
                'color' => 'success',

                'modal' => [
                    'icon' => 'heroicon-o-device-phone-mobile',
                ],

                'notification' => [
                    'icon'    => 'heroicon-o-check-badge',
                    'content' => 'تایید تلفن همراه با موفقیت انجام شد',
                ],
            ],

            'restrict_access' => [
                'label' => 'محدودسازی دسترسی',
                'color' => 'warning',
            ],
        ],
    ],

    UserFields::ID => [
        'label' => 'شناسه',
    ],

    UserFields::MOBILE => [
        'label'       => 'تلفن همراه',
        'placeholder' => '09__ ___ __ __',
    ],

    UserFields::EMAIL => [
        'label'       => 'پست الکترونیک',
        'placeholder' => 'you@negar.dev',
    ],

    UserFields::USERNAME => [
        'label'       => 'نام‌کاربری',
        'placeholder' => 'negar',
    ],

    UserFields::PASSWORD => [
        'label'       => 'گذرواژه',
        'placeholder' => '× × × × ×',
        'hint'        => [
            'edit' => 'درصورتی که نیاز به تغییر ندارید خالی رها کنید',
        ],
    ],

    UserFields::PASSWORD_CONFIRMATION => [
        'label'       => 'تایید گذرواژه',
        'placeholder' => '× × × × ×',
    ],

    UserFields::CURRENT_PASSWORD => [
        'label'       => 'گذرواژه فعلی',
        'placeholder' => '× × × × ×',
    ],

    UserFields::MESSAGE => [
        'label'       => 'پیام موقت',
        'placeholder' => '',
    ],

    UserFields::ACCOUNT_TYPE => [
        'label'       => 'نوع حساب',
        'placeholder' => '',
        'hint'        => [
            'tooltip' => 'فقط حساب کاربری مدیر قادر به مشاهده داشبورد مدیریت است',
        ],
    ],

    UserFields::ACCOUNT_STATUS => [
        'label'       => 'وضعیت حساب',
        'placeholder' => '',
        'hint'        => [
            'tooltip' => 'اجازه ورود و احرازهویت فقط به حساب‌های آزاد داده می‌شود',
        ],
    ],

    UserFields::LIMITATION_END_DATE => [
        'label'       => 'زمان اتمام محدودیت',
        'placeholder' => '',
    ],

    UserFields::MOBILE_VERIFIED_AT => [
        'label'       => 'زمان تایید تلفن همراه',
        'placeholder' => 'تایید نشده',
    ],

    UserFields::EMAIL_VERIFIED_AT => [
        'label'       => 'زمان تایید پست الکترونیک',
        'placeholder' => 'تایید نشده',
    ],

    UserFields::FIRST_LOGIN_AT => [
        'label'       => 'زمان اولین ورود',
        'placeholder' => 'وارد نشده',
    ],
    UserFields::FIRST_LOGIN_IP => [
        'label'       => 'آی‌پی اولین ورود',
        'placeholder' => 'وارد نشده',
    ],

    UserFields::LAST_LOGIN_AT => [
        'label'       => 'زمان آخرین ورود',
        'placeholder' => 'وارد نشده',
    ],
    UserFields::LAST_LOGIN_IP => [
        'label'       => 'آی‌پی آخرین ورود',
        'placeholder' => 'وارد نشده',
    ],

    UserFields::REMEMBER_TOKEN => [
        'label'       => 'کلید یادآوری ورود',
        'placeholder' => 'کلیدی ثبت نشده',
    ],

    UserFields::ACCESS_TOKEN => [
        'label'       => 'کلید دسترسی',
        'placeholder' => 'کلیدی ایجاد نشده',
    ],

    UserFields::ROLES => [
        'label'       => 'نقش‌ها',
        'placeholder' => 'نقش‌ها را انتخاب کنید',
    ],

    UserFields::PERMISSIONS => [
        'label'       => 'دسترسی‌ها',
        'placeholder' => '',
    ],
    UserFields::CREATED_AT  => [
        'label'       => 'زمان ایجاد حساب',
        'placeholder' => '',
    ],

    UserFields::UPDATED_AT => [
        'label'       => 'زمان آخرین تغییر',
        'placeholder' => '',
    ],
];
