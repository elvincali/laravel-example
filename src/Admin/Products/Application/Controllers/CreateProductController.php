<?php

namespace Src\Admin\Products\Application\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Src\Admin\Categories\Domain\Models\Category;
use Src\Admin\Products\Domain\Models\UnitMeasure;
use Src\Support\Response\Domain\BaseResponse;

final class CreateProductController extends Controller
{

    public function __invoke(): JsonResponse
    {
        $reponse = new BaseResponse();

        $reponse->data = [
            'categories' => Category::all(['id', 'name']),
            'units' => UnitMeasure::all(['id', 'name']),
        ];

        return new JsonResponse($reponse);
    }
}
