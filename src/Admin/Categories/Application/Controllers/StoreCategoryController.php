<?php

namespace Src\Admin\Categories\Application\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Src\Admin\Categories\Domain\Models\Category;
use Src\Support\Response\Domain\BaseResponse;

final class StoreCategoryController extends Controller
{

    public function __invoke(Request $request): JsonResponse
    {
        $response = new BaseResponse();

        $category = new Category();
        $category->name = $request->get('name');
        $category->save();

        $response->message = 'Guardado satisfactoriamente.';

        return new JsonResponse($response);
    }
}
