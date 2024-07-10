<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\LengthAwarePaginator;
use App\Repositories\BaseRepository;
use App\Contracts\ProductRepositoryContract;
use App\Models\Product;
use Illuminate\Support\Facades\DB;

class ProductRepository extends BaseRepository implements ProductRepositoryContract
{
    public function paginate(): LengthAwarePaginator
    {
        return $this->query()->active()->select('id', 'name', 'main_image', 'catalogue_price')->paginate(16);
    }

    public function filterByCategories(array $category_slugs = [])
    {
        $this->query = $this->query()->whereHas('categories', function ($q) use ($category_slugs) {
            $q->whereIn('categories.slug', $category_slugs);
            $q->orWhereIn('categories.parent_id', $category_slugs);
        });
        return $this;
    }

    public function filterByPrice(?float $from = null, ?float $to = null)
    {
        if (!is_null($from)) {
            $this->query = $this->query()->where('catalogue_price', '>=', $from);
        }
        if (!is_null($to)) {
            $this->query = $this->query()->where('catalogue_price', '<=', $to);
        }
        return $this;
    }

    public function filterByBrands(array $brands)
    {
        $brands = array_map('strtolower', $brands);
        $this->query = $this->query()->whereIn(DB::raw('LOWER(brand)'), $brands);
        return $this;
    }

    public function filterByColors(array $colors)
    {
        $colors = array_map('strtolower', $colors);
        $this->query = $this->query()->whereHas('attributes', function ($attrQuery) use ($colors) {
            $attrQuery->whereIn('product_attributes.value', $colors);
        });
        return $this;
    }


    public function filterByRating(float $minRating)
    {
        $this->query = $this->query()->whereHas('reviews', function ($query) use ($minRating) {
            $query->where('reviewable_type', Product::class)
                ->groupBy('reviewable_id')
                ->havingRaw('AVG(rating) >= ?', [$minRating])
                ->select('reviewable_id');
        });
        return $this;
    }

    function model(): Model
    {
        return new Product();
    }
}
