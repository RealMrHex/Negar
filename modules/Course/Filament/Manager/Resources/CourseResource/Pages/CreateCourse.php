<?php

namespace Modules\Course\Filament\Manager\Resources\CourseResource\Pages;

use Filament\Resources\Pages\CreateRecord;
use Modules\Course\Filament\Manager\Resources\CourseResource;

class CreateCourse extends CreateRecord
{
    protected static string $resource = CourseResource::class;
}
