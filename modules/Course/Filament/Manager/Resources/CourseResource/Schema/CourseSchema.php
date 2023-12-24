<?php

namespace Modules\Course\Filament\Manager\Resources\CourseResource\Schema;

use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Tabs;
use Filament\Forms\Components\Tabs\Tab;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Modules\Category\Entities\V1\Category\CategoryFields;
use Modules\Course\Entities\V1\Course\CourseFields;
use Modules\Course\Enums\V1\CourseStatus\CourseStatus;
use Modules\Season\Entities\V1\Season\SeasonFields;
use Modules\Support\Contracts\V1\Schema\Schema;
use Modules\Support\Enums\V1\ToggleStatus\ToggleStatus;
use Modules\User\Entities\V1\User\UserFields;
use Modules\User\Enums\V1\AccountType\AccountType;

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
                                                     ->searchable()
                                                     ->relationship(CourseFields::REL_CATEGORY, CategoryFields::TITLE)
                                                     ->preload()
                                                     ->native(false),

                                               Select::make(CourseFields::PRIMARY_TEACHER_ID)
                                                     ->modularTranslate(...self::keys())
                                                     ->required()
                                                     ->searchable()
                                                     ->relationship(
                                                         name            : CourseFields::REL_TEACHER,
                                                         modifyQueryUsing: fn(Builder $query) => $query->where(UserFields::ACCOUNT_TYPE, AccountType::Teacher),
                                                     )
                                                     ->getOptionLabelFromRecordUsing(fn(Model $record) => $record->name)
                                                     ->preload()
                                                     ->native(false),

                                               TextInput::make(CourseFields::TITLE)
                                                        ->modularTranslate(...self::keys())
                                                        ->required(),

                                               TextInput::make(CourseFields::SLUG)
                                                        ->modularTranslate(...self::keys())
                                                        ->unique(ignoreRecord: true)
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
                                                        ->modularTranslate(...self::keys()),

                                               TextInput::make(CourseFields::INSTALLMENT_PRICE)
                                                        ->modularTranslate(...self::keys()),

                                           ]
                                       ),

                                    Tab::make(__('v1.course::filament.course.tabs.registration'))
                                       ->icon('heroicon-o-cursor-arrow-rays')
                                       ->modularTranslate(...self::keys())
                                       ->schema(
                                           [
                                               TextInput::make(CourseFields::MINIMUM_CAPACITY)
                                                        ->modularTranslate(...self::keys()),

                                               TextInput::make(CourseFields::MAXIMUM_CAPACITY)
                                                        ->modularTranslate(...self::keys()),

                                               DateTimePicker::make(CourseFields::REGISTRATION_START_DATE)
                                                             ->modularTranslate(...self::keys())
                                                             ->jalali(),

                                               DateTimePicker::make(CourseFields::REGISTRATION_END_DATE)
                                                             ->modularTranslate(...self::keys())
                                                             ->jalali(),

                                               Select::make(CourseFields::AUTO_CANCELLATION)
                                                     ->modularTranslate(...self::keys())
                                                     ->options(ToggleStatus::pairs())
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
                                                      ->heading(__('v1.course::filament.course.section.access.title'))
                                                      ->description(__('v1.course::filament.course.section.access.description'))
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
                                                      ->heading(__('v1.course::filament.course.section.hold.title'))
                                                      ->description(__('v1.course::filament.course.section.hold.description'))
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
                                                      ->heading(__('v1.course::filament.course.section.sale.title'))
                                                      ->description(__('v1.course::filament.course.section.sale.description'))
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

                                    Tab::make(__('v1.course::filament.course.tabs.episodes'))
                                       ->icon('heroicon-o-book-open')
                                       ->columns(1)
                                       ->schema(
                                           [
                                               Repeater::make(CourseFields::REL_SEASONS)
                                                       ->label(false)
                                                       ->collapsible()
                                                       ->deletable()
                                                       ->collapsed()
                                                       ->relationship(CourseFields::REL_SEASONS)
                                                       ->orderColumn(SeasonFields::WEIGHT)
                                                       ->reorderable()
                                                       ->reorderableWithButtons()
                                                       ->itemLabel(
                                                           function (array $state): ?string
                                                           {
                                                               $prefix = __('v1.season::filament.season.prefix');
                                                               $new    = __('v1.season::filament.season.new');
                                                               $season = v1_numerify()->convert($state[SeasonFields::WEIGHT]);
                                                               $title  = $state[SeasonFields::TITLE];

                                                               return $prefix . ' ' . ($season ?? $new) . ($title ? " • $title" : "");
                                                           }
                                                       )
                                                       ->addActionLabel(__('v1.season::filament.season.add_new'))
                                                       ->columns()
                                                       ->schema(
                                                           [
                                                               Hidden::make(SeasonFields::WEIGHT)->live(),

                                                               TextInput::make(SeasonFields::TITLE)
                                                                        ->modularTranslate(...self::keys())
                                                                        ->live(onBlur: true)
                                                                        ->required(),

                                                               Select::make(SeasonFields::STATUS)
                                                                     ->modularTranslate(...self::keys())
                                                                     ->required()
                                                                     ->options(ToggleStatus::pairs())
                                                                     ->native(false),
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
                                                ->mask('99:99:99')
                                                ->placeholder('HH:MM:SS')
                                                ->extraAttributes(['dir' => 'ltr'])
                                                ->required(),

                                       Select::make(CourseFields::STATUS)
                                             ->modularTranslate(...self::keys())
                                             ->options(CourseStatus::pairs())
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
