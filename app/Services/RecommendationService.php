<?php

namespace App\Services;

use App\Models\Product;
use Illuminate\Support\Facades\Auth;

class RecommendationService
{
    /**
     * Get recommended products for the authenticated user based on their favorite departments.
     *
     * @param int $limit
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function getRecommendedProducts(int $limit = 5)
    {
        $user = Auth::user();

        if (!$user) {
            return collect();
        }

        $departmentIds = $user->departments()->pluck('departments.id')->toArray();

        $products = Product::whereHas('categories', function ($query) use ($departmentIds) {
            $query->whereHas('department', function ($query) use ($departmentIds) {
                $query->whereIn('departments.id', $departmentIds);
            });
        })->take($limit)->get();

        return $products;
    }

    public function getRecommendedDepartments(int $limit = 5)
    {
        $user = Auth::user();

        if (!$user) {
            return collect();
        }

        $departments = $user->departments()->get();

        return $departments;
    }
}
