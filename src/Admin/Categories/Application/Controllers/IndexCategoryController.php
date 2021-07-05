<?php

namespace Src\Admin\Categories\Application\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Src\Admin\Categories\Domain\Repositories\CategoryRepository;
use Src\Support\Response\Domain\BaseResponse;

final class IndexCategoryController extends Controller
{
    private CategoryRepository $repository;

    public function __construct(CategoryRepository $repository)
    {
        $this->repository = $repository;
    }

    public function __invoke(Request $request): JsonResponse
    {
        $response = new BaseResponse();

        $response->data = $this->repository->index($request->get('perPage'));

        return new JsonResponse($response);
    }
}
