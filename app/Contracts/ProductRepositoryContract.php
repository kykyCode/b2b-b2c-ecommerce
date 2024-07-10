<?php

namespace App\Contracts;

use Illuminate\Pagination\LengthAwarePaginator;

interface ProductRepositoryContract
{
    public function paginate(): LengthAwarePaginator;

    public function filterByCategories(array $categories_ids);
}
