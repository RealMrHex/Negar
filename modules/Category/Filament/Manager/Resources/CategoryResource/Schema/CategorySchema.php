<?php

namespace Modules\Category\Filament\Manager\Resources\CategoryResource\Schema;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Database\Eloquent\Model;
use Modules\Category\Entities\V1\Category\CategoryFields;
use Modules\Support\Contracts\V1\Schema\Schema;
use Modules\Support\Enums\V1\ToggleStatus\ToggleStatus;

class CategorySchema extends Schema
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
                        Section::make()
                               ->columnSpan(
                                   [
                                       'xl' => 8,
                                   ]
                               )
                               ->columns()
                               ->schema(
                                   [
                                       TextInput::make(CategoryFields::TITLE)
                                                ->modularTranslate(...self::keys())
                                                ->columnSpanFull()
                                                ->required(),

                                       TextInput::make(CategoryFields::SLUG)
                                                ->modularTranslate(...self::keys())
                                                ->unique(ignoreRecord: true)
                                                ->extraAttributes(['dir' => 'ltr'])
                                                ->required(),

                                       Select::make(CategoryFields::PARENT_ID)
                                             ->modularTranslate(...self::keys())
                                             ->relationship(CategoryFields::REL_PARENT, CategoryFields::TITLE)
                                             ->options(v1_category()->all()->pluck(CategoryFields::TITLE, CategoryFields::ID))
                                             ->searchable()
                                             ->native(false),

                                       Select::make(CategoryFields::STATUS)
                                             ->modularTranslate(...self::keys())
                                             ->native(false)
                                             ->required()
                                             ->options(ToggleStatus::pairs()),

                                       TextInput::make(CategoryFields::WEIGHT)
                                                ->modularTranslate(...self::keys())
                                                ->unique(ignoreRecord: true)
                                                ->required(),

                                       RichEditor::make(CategoryFields::DESCRIPTION)
                                                 ->modularTranslate(...self::keys())
                                                 ->columnSpanFull()
                                                 ->required(),

                                       RichEditor::make(CategoryFields::CONTENT)
                                                 ->modularTranslate(...self::keys())
                                                 ->columnSpanFull()
                                                 ->required(),
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
                                       FileUpload::make(CategoryFields::COVER)
                                                 ->modularLabel(...self::keys())
                                                 //->required()
                                                 ->disk(disk())
                                                 ->image()
                                                 ->alignCenter(),

                                       FileUpload::make(CategoryFields::SOCIAL_PREVIEW)
                                                 ->modularLabel(...self::keys())
                                                 ->disk(disk())
                                                 ->image()
                                                 ->imageEditor(),
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
        return [
            TextColumn::make(CategoryFields::TITLE)
                      ->searchable()
                      ->modularLabel(...self::keys()),

            TextColumn::make(CategoryFields::SLUG)
                      ->searchable()
                      ->modularLabel(...self::keys()),

            TextColumn::make(CategoryFields::REL_PARENT . '.' . CategoryFields::TITLE)
                      ->badge(fn(Model $record) => !$record->{CategoryFields::PARENT_ID})
                      ->color(fn(Model $record) => $record->{CategoryFields::PARENT_ID} ? 'info' : 'warning')
                      ->default(__('v1.category::filament.global.is_parent'))
                      ->label(__('v1.category::filament.category.title.label')),

            TextColumn::make(CategoryFields::WEIGHT)
                      ->modularLabel(...self::keys()),

            TextColumn::make(CategoryFields::STATUS)
                      ->modularLabel(...self::keys())
                      ->badge()
                      ->icon(fn(Model $model) => $model->{CategoryFields::STATUS} === ToggleStatus::Enabled ? 'heroicon-o-check-circle' : 'heroicon-o-exclamation-circle')
                      ->color(fn(Model $model) => $model->{CategoryFields::STATUS} === ToggleStatus::Enabled ? 'success' : 'danger')
                      ->formatStateUsing(fn(Model $model) => $model->{CategoryFields::STATUS}->trans()),

            TextColumn::make(CategoryFields::UPDATED_AT)
                      ->modularLabel(...self::keys())
                      ->jalaliDateTime('d F Y - H:i')
                      ->toggleable()
                      ->tooltip(fn(Model $record): string => jdate($record->{CategoryFields::UPDATED_AT})->ago()),

            TextColumn::make(CategoryFields::CREATED_AT)
                      ->modularLabel(...self::keys())
                      ->jalaliDateTime('d F Y - H:i')
                      ->toggleable()
                      ->tooltip(fn(Model $record): string => jdate($record->{CategoryFields::CREATED_AT})->ago()),
        ];
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
