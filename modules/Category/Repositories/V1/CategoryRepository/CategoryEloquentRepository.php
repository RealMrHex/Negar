<?php

namespace Modules\Category\Repositories\V1\CategoryRepository;

use Modules\Base\Repositories\V1\BaseRepository\BaseRepository;
use Modules\Category\Contracts\V1\CategoryRepository\CategoryRepository;
use Modules\Category\Entities\V1\Category\Category;

class CategoryEloquentRepository extends BaseRepository implements CategoryRepository
{
    /**
     * Specify Model class name
     */
    public function model(): string
    {
        return Category::class;
    }
}
