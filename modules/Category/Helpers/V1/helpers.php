<?php

use Modules\Category\Contracts\V1\CategoryRepository\CategoryRepository;

if (!function_exists('v1_category'))
{
    /**
     * Get the category repository
     *
     * @return CategoryRepository
     */
    function v1_category(): CategoryRepository
    {
        return resolve(CategoryRepository::class);
    }
}
