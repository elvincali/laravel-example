<?php

namespace Src\Admin\Categories\Application\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Src\Admin\Categories\Application\Resources\CategoryEditResource;
use Src\Admin\Categories\Domain\Models\Category;
use Src\Support\Response\Domain\BaseResponse;

final class EditCategoryController extends Controller
{
    public function __invoke(Request $request, $id): JsonResponse
    {
        $response = new BaseResponse();

        $response->data = [
            'category' => new CategoryEditResource(Category::query()->findOrFail($id))
        ];

        return new JsonResponse($response);
    }
}
