<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCartRequest;
use App\Models\Cart;
use App\Services\ApiTokenService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(ApiTokenService $apiTokenService): JsonResponse
    {
        if (!$apiTokenService->verify(request()->token)) {
            throw new NotFoundHttpException();
        }
        $carts = Cart::with(['product', 'product.images'])->get();
        $apiTokenService->destroy(request()->token);

        return response()->json([
            'carts' => $carts,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCartRequest $request): JsonResponse
    {
        if (!Cart::where('product_id', $request->product_id)->first()) {
            Cart::create($request->validated());
        }

        return response()->json([
            'success' => true,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): JsonResponse
    {
        $cart = Cart::findOrFail($id);
        $cart->delete();

        return response()->json([
            'success' => true
        ]);
    }
}
