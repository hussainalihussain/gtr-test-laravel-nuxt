<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Services\ApiTokenService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class ProductController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request, ApiTokenService $apiTokenService): JsonResponse
    {
        if (!$apiTokenService->verify(request()->token)) {
            throw new NotFoundHttpException();
        }
        $products = Product::with('images')->get();
        $apiTokenService->destroy(request()->token);

        return response()->json([
            'products' => $products,
        ]);
    }
}
