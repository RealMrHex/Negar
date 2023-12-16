<?php

namespace Modules\Course\Filament\Manager\Resources\CourseResource\Schema;

use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Tabs;
use Filament\Forms\Components\Tabs\Tab;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Modules\Course\Entities\V1\Course\CourseFields;
use Modules\Support\Contracts\V1\Schema\Schema;

class CourseSchema extends Schema
{
    /**
     * Design the form schema
     *
     * @return array
     */
    public static function form(): array
    {
        return [
            Grid::make()
                ->columns(12)
                ->schema(
                    [
                        Tabs::make()
                            ->columnSpan(
                                [
                                    'xl' => 8,
                                ]
                            )
                            ->columns()
                            ->schema(
                                [
                                    Tab::make(__('v1.course::filament.course.tabs.base'))
                                       ->icon('heroicon-o-academic-cap')
                                       ->modularTranslate(...self::keys())
                                       ->schema(
                                           [
                                               Select::make(CourseFields::PRIMARY_CATEGORY_ID)
                                                     ->modularTranslate(...self::keys())
                                                     ->required()
                                                     ->native(false),

                                               Select::make(CourseFields::PRIMARY_TEACHER_ID)
                                                     ->modularTranslate(...self::keys())
                                                     ->required()
                                                     ->native(false),

                                               TextInput::make(CourseFields::TITLE)
                                                        ->modularTranslate(...self::keys())
                                                        ->required(),

                                               TextInput::make(CourseFields::SLUG)
                                                        ->modularTranslate(...self::keys())
                                                        ->required(),
                                           ]
                                       ),

                                    Tab::make(__('v1.course::filament.course.tabs.pricing'))
                                        ->icon('heroicon-o-banknotes')
                                       ->modularTranslate(...self::keys())
                                       ->schema(
                                           [
                                               TextInput::make(CourseFields::PRICE)
                                                        ->modularTranslate(...self::keys())
                                                        ->required(),

                                               TextInput::make(CourseFields::OFF_PRICE)
                                                        ->modularTranslate(...self::keys())
                                                        ->required(),

                                               TextInput::make(CourseFields::INSTALLMENT_PRICE)
                                                        ->modularTranslate(...self::keys())
                                                        ->required(),

                                           ]
                                       ),

                                    Tab::make(__('v1.course::filament.course.tabs.registration'))
                                        ->icon('heroicon-o-cursor-arrow-rays')
                                       ->modularTranslate(...self::keys())
                                       ->schema(
                                           [
                                               TextInput::make(CourseFields::MINIMUM_CAPACITY)
                                                        ->modularTranslate(...self::keys())
                                                        ->required(),

                                               TextInput::make(CourseFields::MAXIMUM_CAPACITY)
                                                        ->modularTranslate(...self::keys())
                                                        ->required(),

                                               DateTimePicker::make(CourseFields::REGISTRATION_START_DATE)
                                                             ->modularTranslate(...self::keys())
                                                             ->required(),

                                               DateTimePicker::make(CourseFields::REGISTRATION_END_DATE)
                                                             ->modularTranslate(...self::keys())
                                                             ->required(),

                                               Select::make(CourseFields::AUTO_CANCELLATION)
                                                     ->modularTranslate(...self::keys())
                                                     ->required()
                                                     ->native(false),
                                           ]
                                       ),

                                    Tab::make(__('v1.course::filament.course.tabs.content'))
                                        ->icon('heroicon-o-book-open')
                                       ->modularTranslate(...self::keys())
                                       ->columns(1)
                                       ->schema(
                                           [
                                               RichEditor::make(CourseFields::SHORT_DESCRIPTION)
                                                         ->modularTranslate(...self::keys())
                                                         ->required(),

                                               RichEditor::make(CourseFields::LONG_DESCRIPTION)
                                                         ->modularTranslate(...self::keys())
                                                         ->required(),
                                           ]
                                       ),

                                    Tab::make(__('v1.course::filament.course.tabs.config'))
                                        ->icon('heroicon-o-cog-6-tooth')
                                       ->schema(
                                           [
                                               Section::make()
                                                      ->heading('نحوه دسترسی به دوره')
                                                      ->description('مشخص کنید که در چه شرایطی امکان دسترسی به دوره وجود دارد')
                                                      ->columns(3)
                                                      ->schema(
                                                          [
                                                              Toggle::make(CourseFields::FREE_ACCESS)
                                                                    ->modularTranslate(...self::keys())
                                                                    ->inline(false),

                                                              Toggle::make(CourseFields::CASH_ACCESS)
                                                                    ->modularTranslate(...self::keys())
                                                                    ->inline(false),

                                                              Toggle::make(CourseFields::SUBSCRIPTION_ACCESS)
                                                                    ->modularTranslate(...self::keys())
                                                                    ->inline(false),
                                                          ]
                                                      ),

                                               Section::make()
                                                      ->heading('نحوه برگزاری دوره')
                                                      ->description('روش های برگزاری دوره را مشخص کنید')
                                                      ->columns(3)
                                                      ->schema(
                                                          [
                                                              Toggle::make(CourseFields::IS_ONLINE)
                                                                    ->modularTranslate(...self::keys())
                                                                    ->inline(false),

                                                              Toggle::make(CourseFields::IS_FACE_TO_FACE)
                                                                    ->modularTranslate(...self::keys())
                                                                    ->inline(false),

                                                              Toggle::make(CourseFields::IS_OFFLINE)
                                                                    ->modularTranslate(...self::keys())
                                                                    ->inline(false),
                                                          ]
                                                      ),

                                               Section::make()
                                                      ->heading('نحوه فروش دوره')
                                                      ->description('تنظیمات مرتبط با فروش دوره و خرید به صورت نقدی و اقساطی')
                                                      ->columns(3)
                                                      ->schema(
                                                          [
                                                              Toggle::make(CourseFields::IS_PURCHASABLE)
                                                                    ->modularTranslate(...self::keys())
                                                                    ->inline(false),

                                                              Toggle::make(CourseFields::IS_INSTALLMENTABLE)
                                                                    ->modularTranslate(...self::keys())
                                                                    ->inline(false),
                                                          ]
                                                      ),
                                           ]
                                       ),
                                ]
                            ),

                        Section::make()
                               ->columnSpan(
                                   [
                                       'xl' => 4,
                                   ]
                               )
                               ->columns(1)
                               ->schema(
                                   [
                                       FileUpload::make(CourseFields::COVER)
                                                 ->modularLabel(...self::keys())
                                                 ->required()
                                                 ->disk(disk())
                                                 ->image()
                                                 ->alignCenter(),

                                       TextInput::make(CourseFields::DURATION)
                                                ->modularTranslate(...self::keys())
                                                ->required(),

                                       Select::make(CourseFields::STATUS)
                                             ->modularTranslate(...self::keys())
                                             ->required()
                                             ->native(false),
                                   ]
                               ),
                    ]
                ),

        ];
    }

    /**
     * Design the table schema
     *
     * @return array
     */
    public static function table(): array
    {
        return [];
    }

    /**
     * Design the wrapped form schema
     *
     * @return array
     */
    public static function wrappedForm(): array
    {
        return self::form();
    }
}
