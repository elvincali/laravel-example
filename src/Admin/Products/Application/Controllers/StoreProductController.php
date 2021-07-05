<?php

namespace Src\Admin\Products\Application\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Src\Admin\Products\Application\Requests\ProductStoreRequest;
use Src\Admin\Products\Domain\Models\Product;
use Src\Support\Response\Domain\BaseResponse;

final class StoreProductController extends Controller
{

    public function __invoke(ProductStoreRequest $request): JsonResponse
    {
        $response = new BaseResponse();

        $product = new Product();
        $product->name = $request->get('name');
        $product->description = $request->get('description');
        $product->code = $request->get('code');
        $product->unit_measure_id = $request->get('unit_measure_id');
        $product->price = $request->get('price');
        $product->comparision_price = $request->get('comparision_price');
        $product->category_id = $request->get('category_id');
        $product->save();

        $product->files()->attach($request->get('files_id'));

        $response->message = "El producto fue creado satisfactoriamente.";

        return new JsonResponse($response, JsonResponse::HTTP_CREATED);
    }
}
