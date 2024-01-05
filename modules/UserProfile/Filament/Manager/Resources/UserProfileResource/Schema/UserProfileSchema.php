<?php

namespace Modules\UserProfile\Filament\Manager\Resources\UserProfileResource\Schema;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Placeholder;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Database\Eloquent\Model;
use Modules\Support\Contracts\V1\Schema\Schema;
use Modules\User\Entities\V1\User\UserFields;
use Modules\UserProfile\Entities\V1\UserProfile\UserProfileFields;
use Modules\UserProfile\Enums\V1\Gender\Gender;

class UserProfileSchema extends Schema
{
    /**
     * Design the form schema
     *
     * @return array
     */
    public static function form(): array
    {
        return [
            FileUpload::make(UserProfileFields::AVATAR)
                      ->modularLabel(...self::keys())
                      ->disk(disk())
                      ->circleCropper()
                      ->avatar()
                      ->imageEditor()
                      ->downloadable()
                      ->alignCenter(),

            Grid::make()
                ->columnSpan(1)
                ->columns(1)
                ->schema(
                    [
                        Placeholder::make(UserProfileFields::REL_USER . '.' . UserFields::EMAIL)
                                   ->modularTranslate(...self::keys())
                                   ->content(fn(Model $record) => $record->{UserProfileFields::REL_USER}->{UserFields::EMAIL} ?? __('v1.userprofile::filament.global.not_entered')),

                        Placeholder::make(UserProfileFields::REL_USER . '.' . UserFields::EMAIL)
                                   ->modularTranslate(...self::keys())
                                   ->content(fn(Model $record) => $record->{UserProfileFields::REL_USER}->{UserFields::MOBILE} ?? __('v1.userprofile::filament.global.not_entered')),
                    ]
                ),

            TextInput::make(UserProfileFields::FIRST_NAME)
                     ->modularTranslate(...self::keys()),

            TextInput::make(UserProfileFields::LAST_NAME)
                     ->modularTranslate(...self::keys()),

            DatePicker::make(UserProfileFields::BIRTH_DATE)
                      ->modularTranslate(...self::keys())
                      ->jalali()
                      ->closeOnDateSelection(),

            Select::make(UserProfileFields::GENDER)
                  ->modularTranslate(...self::keys())
                  ->options(Gender::pairs())
                  ->native(false),
        ];
    }

    /**
     * Design the table schema
     *
     * @return array
     */
    public static function table(): array
    {
        return [
            ImageColumn::make(UserProfileFields::AVATAR)
                       ->modularLabel(...self::keys())
                       ->disk(disk())
                       ->circular(),

            TextColumn::make(UserProfileFields::REL_USER . '.' . UserFields::EMAIL)
                      ->formatStateUsing(fn(Model $record) => $record->{UserProfileFields::REL_USER}->{UserFields::EMAIL} ?? __('v1.userprofile::filament.global.not_entered'))
                      ->searchable()
                      ->modularLabel(...self::keys()),

            TextColumn::make(UserProfileFields::REL_USER . '.' . UserFields::MOBILE)
                      ->formatStateUsing(fn(Model $record) => $record->{UserProfileFields::REL_USER}->{UserFields::MOBILE} ?? __('v1.userprofile::filament.global.not_entered'))
                      ->searchable()
                      ->modularLabel(...self::keys()),

            TextColumn::make(UserProfileFields::FIRST_NAME)
                      ->modularLabel(...self::keys())
                      ->default(__('v1.userprofile::filament.global.not_entered'))
                      ->searchable(),

            TextColumn::make(UserProfileFields::LAST_NAME)
                      ->modularLabel(...self::keys())
                      ->default(__('v1.userprofile::filament.global.not_entered'))
                      ->searchable(),

            TextColumn::make(UserProfileFields::GENDER)
                      ->modularLabel(...self::keys())
                      ->badge()
                      ->default('')
                      ->color(fn(Model $record) => empty($record->{UserProfileFields::GENDER})
                          ? 'gray'
                          : $record->{UserProfileFields::GENDER}->color()
                      )
                      ->formatStateUsing(
                          fn(Model $record) => empty($record->{UserProfileFields::GENDER})
                              ? __('v1.userprofile::filament.global.not_entered')
                              : $record->{UserProfileFields::GENDER}->trans()
                      ),

            TextColumn::make(UserProfileFields::BIRTH_DATE)
                      ->modularLabel(...self::keys())
                      ->default('')
                      ->jalaliDate()
                      ->formatStateUsing(
                          fn(Model $record) => empty($record->{UserProfileFields::BIRTH_DATE})
                              ? __('v1.userprofile::filament.global.not_entered')
                              : jdate($record->{UserProfileFields::BIRTH_DATE})->format('Y/m/j')
                      )
                      ->tooltip(
                          fn(Model $record) => empty($record->{UserProfileFields::BIRTH_DATE})
                              ? null
                              : jdate($record->{UserProfileFields::BIRTH_DATE})->ago()
                      ),
        ];
    }

    /**
     * Design the wrapped form schema
     *
     * @return array
     */
    public static function wrappedForm(): array
    {
        return [
            Section::make()
                   ->columns()
                   ->schema(self::form()),
        ];
    }
}
