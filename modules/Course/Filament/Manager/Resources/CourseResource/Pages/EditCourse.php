<?php

namespace Modules\Course\Filament\Manager\Resources\CourseResource\Pages;

use Filament\Resources\Pages\EditRecord;
use Filament\Actions\DeleteAction;
use Modules\Course\Filament\Manager\Resources\CourseResource;

class EditCourse extends EditRecord
{
    protected static string $resource = CourseResource::class;

    /**
     * Get header actions
     *
     * @return array
     */
    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
