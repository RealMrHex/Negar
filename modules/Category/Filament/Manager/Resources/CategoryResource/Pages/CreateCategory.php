<?php

namespace Modules\Category\Filament\Manager\Resources\CategoryResource\Pages;

use Filament\Resources\Pages\CreateRecord;
use Modules\Category\Filament\Manager\Resources\CategoryResource;

class CreateCategory extends CreateRecord
{
    protected static string $resource = CategoryResource::class;
}
