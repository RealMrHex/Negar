<?php

namespace Modules\Category\Filament\Manager\Resources\CategoryResource\Pages;

use Filament\Resources\Pages\EditRecord;
use Modules\Category\Filament\Manager\Resources\CategoryResource;

class EditCategory extends EditRecord
{
    protected static string $resource = CategoryResource::class;
}
