<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Resources\OrderResource;
use App\Services\OrderProcessorService;
use App\Http\Requests\StoreOrderRequest;
use Illuminate\Http\JsonResponse;

class OrderController extends Controller
{
    protected OrderProcessorService $orderProcessorService;

    /**
     * OrderController constructor.
     *
     * @param OrderProcessorService $orderProcessorService
     */
    public function __construct(OrderProcessorService $orderProcessorService)
    {
        $this->orderProcessorService = $orderProcessorService;
    }

    public function index()
    {
        return OrderResource::collection(
            Order::where('user_id', Auth::id())
                ->with('items', 'user', 'payment.paymentMethod')
                ->orderBy('created_at', 'desc')
                ->paginate(20)
        );
    }


    public function store(StoreOrderRequest $request): JsonResponse
    {
        try {
            $this->orderProcessorService->processOrder($request->validated());
            return response()->json([
                'message' => 'Successfully created order',
                'status' => 201
            ], 201);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Failed to create order',
                'error' => $e->getMessage(),
                'status' => 500
            ], 500);
        }
    }

    public function show(Order $order)
    {
        if ($order->user_id !== Auth::id()) {
            return response()->json(['error' => 'Unauthorized'], 403);
        }

        return response()->json($order->load('items.product', 'payment.paymentMethod', 'user'));
    }
}
