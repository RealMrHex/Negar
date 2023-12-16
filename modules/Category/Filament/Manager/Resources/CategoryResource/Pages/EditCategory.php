<?php

namespace Modules\Category\Filament\Manager\Resources\CategoryResource\Pages;

use Filament\Actions\CreateAction;
use Filament\Resources\Pages\EditRecord;
use Modules\Category\Filament\Manager\Resources\CategoryResource;

class EditCategory extends EditRecord
{
    protected static string $resource = CategoryResource::class;

    /**
     * Get header actions
     *
     * @return array
     */
    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
