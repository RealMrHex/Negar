<?php

namespace Modules\Roadmap\Filament\Manager\Resources\RoadmapResource\Schema;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Database\Eloquent\Model;
use Modules\Roadmap\Entities\V1\Roadmap\RoadmapFields;
use Modules\Support\Contracts\V1\Schema\Schema;
use Modules\Support\Enums\V1\ToggleStatus\ToggleStatus;

class RoadmapSchema extends Schema
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
                                       TextInput::make(RoadmapFields::TITLE)
                                                ->modularTranslate(...self::keys())
                                                ->required()
                                                ->columnSpanFull(),

                                       TextInput::make(RoadmapFields::SLUG)
                                                ->modularTranslate(...self::keys())
                                                ->unique(ignoreRecord: true)
                                                ->extraAttributes(['dir' => 'ltr'])
                                                ->required()
                                                ->columnSpanFull(),

                                       TextInput::make(RoadmapFields::WEIGHT)
                                                ->modularTranslate(...self::keys())
                                                ->unique(ignoreRecord: true)
                                                ->required(),

                                       Select::make(RoadmapFields::STATUS)
                                             ->modularTranslate(...self::keys())
                                             ->required()
                                             ->native(false)
                                             ->options(ToggleStatus::pairs()),

                                       RichEditor::make(RoadmapFields::DESCRIPTION)
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
                                       FileUpload::make(RoadmapFields::LOGO)
                                                 ->modularLabel(...self::keys())
                                                 ->required()
                                                 ->disk(disk())
                                                 ->image()
                                                 ->alignCenter(),

                                       FileUpload::make(RoadmapFields::THUMBNAIL)
                                                 ->modularLabel(...self::keys())
                                                 ->required()
                                                 ->disk(disk())
                                                 ->image()
                                                 ->imageEditor(),

                                       FileUpload::make(RoadmapFields::DEMO)
                                                 ->modularLabel(...self::keys())
                                                 ->disk(disk())
                                                 ->acceptedFileTypes(['video/*'])
                                                 ->alignCenter(),

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
            ImageColumn::make(RoadmapFields::LOGO)
                       ->modularLabel(...self::keys()),

            ImageColumn::make(RoadmapFields::THUMBNAIL)
                       ->modularLabel(...self::keys()),

            TextColumn::make(RoadmapFields::TITLE)
                      ->modularLabel(...self::keys()),

            TextColumn::make(RoadmapFields::SLUG)
                      ->modularLabel(...self::keys())
                      ->color('primary'),

            TextColumn::make(RoadmapFields::WEIGHT)
                      ->sortable()
                      ->modularLabel(...self::keys()),

            TextColumn::make(RoadmapFields::STATUS)
                      ->modularLabel(...self::keys())
                      ->badge()
                      ->icon(fn(Model $model) => $model->status === ToggleStatus::Enabled ? 'heroicon-o-check-circle' : 'heroicon-o-exclamation-circle')
                      ->color(fn(Model $model) => $model->status === ToggleStatus::Enabled ? 'success' : 'danger')
                      ->formatStateUsing(fn(Model $model) => $model->status->trans()),
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
