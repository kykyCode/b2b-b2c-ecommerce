<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Department;
use App\Models\ProductAttribute;
use Illuminate\Support\Facades\DB;
use App\Services\RecommendationService;
use App\Services\LastViewedProductsService;

class AppController extends Controller
{
    protected $recommendationService;
    protected $lastViewedProductsService;

    public function __construct(
        RecommendationService $recommendationService,
        LastViewedProductsService $lastViewedProductsService
    ) {
        $this->recommendationService = $recommendationService;
        $this->lastViewedProductsService = $lastViewedProductsService;
    }

    public function catalog()
    {
        $departments = Department::with('categories')->get()->map(function ($department) {
            return [
                'key' => $department->key,
                'name' => $department->name,
                'categories' => $department->categories->map(function ($category) {
                    return [
                        'slug' => $category->slug,
                        'name' => $category->name,
                    ];
                }),
            ];
        });

        return response()->json($departments);
    }


    public function filters()
    {
        $brands = DB::table('products')
            ->distinct()
            ->whereNotNull('brand')
            ->take(30)
            ->pluck('brand');

        $colors = ProductAttribute::select('value', DB::raw('MAX(optional_value) as optional_value'))
            ->where('attribute_id', 2)
            ->groupBy('value')
            ->get();

        return response()->json([
            'brands' => $brands,
            'colors' => $colors
        ]);
    }

    public function lastViewedProducts()
    {
        return response()->json($this->lastViewedProductsService->getLastViewedProducts(request('limit')));
    }

    public function landingData()
    {
        return response()->json([
            'discount_deals' => Product::with(['categories' => function ($query) {
                $query->take(1)->select('name', 'slug');
            }])->take(4)->inRandomOrder()->get(),
            'last_viewed_products' => $this->lastViewedProductsService->getLastViewedProducts(5),
            'recommended_products' => $this->recommendationService->getRecommendedProducts(),
            'recommended_departments' => $this->recommendationService->getRecommendedDepartments(),
            'departments' => Department::take(4)->get(),
        ]);
    }
}
