<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\ProductIndexRequest;
use App\Http\Resources\ShowProductResource;
use App\Contracts\ProductRepositoryContract;

class ProductController extends Controller
{
    /**
     * @var ProductRepositoryContract
     */
    protected $productRepository;

    public function __construct(ProductRepositoryContract $productRepository)
    {
        $this->productRepository = $productRepository;
        $this->middleware('track.last.viewed')->only('show');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(ProductIndexRequest $request)
    {
        $this->convertColors($request);
        if ($request->get('categories')) $this->productRepository->filterByCategories($request->get('categories'));
        if ($request->get('price_from') || $request->get('price_to')) $this->productRepository->filterByPrice($request->get('price_from'), $request->get('price_to'));
        if ($request->get('brands')) $this->productRepository->filterByBrands($request->get('brands'));
        if ($request->get('colors')) $this->productRepository->filterByColors($request->get('colors'));
        if ($request->get('rating')) $this->productRepository->filterByRating($request->get('rating'));

        return $this->productRepository->paginate();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        return response()->json(new ShowProductResource($product->load('categories', 'attributes', 'stock', 'reviews.user', 'relatedProducts.categories')));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //
    }

    public function addProductToFavorites(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
        ]);

        $user = Auth::user();
        $productId = $request->input('product_id');

        if (!$user->favoriteProducts()->where('product_id', $productId)->exists()) {
            $user->favoriteProducts()->attach($productId);
            return response()->json([
                'message' => 'Product added to favorites successfully.',
            ], 200);
        }

        return response()->json([
            'message' => 'Product is already in favorites.',
        ], 400);
    }

    public function removeProductFromFavorites(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
        ]);

        $user = Auth::user();
        $productId = $request->input('product_id');

        if ($user->favoriteProducts()->where('product_id', $productId)->exists()) {
            $user->favoriteProducts()->detach($productId);
            return response()->json([
                'message' => 'Product removed from favorites successfully.',
            ], 200);
        }

        return response()->json([
            'message' => 'Product is not in favorites.',
        ], 400);
    }

    public function getFavoriteProducts(Request $request)
    {
        $user = Auth::user();

        $favoriteProducts = $user->favoriteProducts()->get();

        return response()->json($favoriteProducts, 200);
    }

    public function getRecommendedProducts(Request $request)
    {
        $user = Auth::user();

        $favoriteDepartments = $user->departments()->pluck('departments.id');

        $recommendedProducts = Product::whereHas('categories', function ($query) use ($favoriteDepartments) {
            $query->whereIn('categories.department_id', $favoriteDepartments);
        })
            ->limit(5)
            ->get();

        return response()->json($recommendedProducts);
    }

    protected function convertColors(ProductIndexRequest $request)
    {
        $colors = $request->get('colors');
        if ($colors && !is_array($colors)) {
            $colors = explode(',', $colors);
            $request->merge(['colors' => $colors]);
        }
    }
}
