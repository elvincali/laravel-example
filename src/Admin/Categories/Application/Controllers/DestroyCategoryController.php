<?php

namespace Src\Admin\Categories\Application\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Src\Admin\Categories\Application\Requests\CategoryDestroyRequest;
use Src\Admin\Categories\Domain\Models\Category;
use Src\Support\Response\Domain\BaseResponse;

final class DestroyCategoryController extends Controller
{
    public function __invoke(CategoryDestroyRequest $request, $id): JsonResponse
    {
        $response = new BaseResponse();

        $category = Category::query()->findOrFail($id);
        $category->state = 0;
        $category->save();

        $response->message = 'Eliminado satisfactoriamente.';

        return new JsonResponse($response);
    }
}
