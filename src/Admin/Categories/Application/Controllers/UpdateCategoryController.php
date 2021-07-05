<?php

namespace Src\Admin\Categories\Application\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Src\Admin\Categories\Domain\Models\Category;
use Src\Support\Response\Domain\BaseResponse;

final class UpdateCategoryController extends Controller
{
    public function __invoke(Request $request, $id): JsonResponse
    {
        $response = new BaseResponse();

        $category = Category::query()->findOrFail($id);
        $category->name = $request->get('name');
        $category->save();

        $response->message = 'Modificado satisfactoriamente.';

        return new JsonResponse($response);
    }
}
