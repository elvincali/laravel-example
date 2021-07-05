<?php

namespace Src\Admin\Products\Application\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Src\Admin\Products\Domain\Repositories\ProductRepository;
use Src\Support\Response\Domain\BaseResponse;

final class IndexProductController extends Controller
{

    private ProductRepository $repository;

    public function __construct(ProductRepository $repository)
    {
        $this->repository = $repository;
    }

    public function __invoke(): JsonResponse
    {
        $response = new BaseResponse();

        $response->data = $this->repository->index();

        return new JsonResponse($response);
    }

}
