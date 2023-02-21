<?php

namespace Truckpag\Presentation\Controllers\Product;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Truckpag\Application\Controllers\Product\ChangeStatus;
use Truckpag\Application\Controllers\Product\GetProduct;
use Truckpag\Application\Controllers\Product\GetProducts;
use Truckpag\Application\Controllers\Product\UpdateProduct;

class ProductController extends Controller
{
    public function __construct(
        private readonly GetProducts $getProducts,
        private readonly GetProduct $getProduct,
        private readonly ChangeStatus $changeStatus,
        private readonly UpdateProduct $updateProduct,
    )
    {
    }

    public function getProducts(): JsonResponse
    {
        return response()->json($this->getProducts->getProductsPaginated());
    }

    public function getProduct(int $code): JsonResponse
    {
        return response()->json($this->getProduct->getProductByCode($code));
    }

    public function changeProductStatus(Request $request, int $code): JsonResponse
    {
        $this->changeStatus->toTrash($code);
        return response()->json('',Response::HTTP_NO_CONTENT);
    }

    public function updateProduct(Request $request, int $code): JsonResponse
    {
        $this->updateProduct->updateOutdatedProduct($code, $request->toArray());
        return response()->json('', Response::HTTP_NO_CONTENT);
    }
}
