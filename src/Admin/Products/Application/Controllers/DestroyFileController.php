<?php

namespace Src\Admin\Products\Application\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;
use Src\Admin\Products\Application\Requests\ProductDestroyRequest;
use Src\Support\Domain\Models\File;
use Src\Support\Response\Domain\BaseResponse;

final class DestroyFileController extends Controller
{
    public function __invoke(ProductDestroyRequest $request, $id): JsonResponse
    {
        $response = new BaseResponse();

        $file = File::query()->findOrFail($id);
        $file->removeFileFromDisk();
        $file->delete();

        return new JsonResponse($response, Response::HTTP_NO_CONTENT);
    }
}
