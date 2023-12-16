<?php

namespace Modules\Category\Filament\Manager\Resources\CategoryResource\Schema;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Modules\Category\Entities\V1\Category\CategoryFields;
use Modules\Support\Contracts\V1\Schema\Schema;
use Modules\Support\Enums\V1\Entities\Entities;
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
                                             ->relationship('parent', CategoryFields::TITLE)
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
                                                 ->required()
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
