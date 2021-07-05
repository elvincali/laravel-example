<?php

namespace Src\Admin\Products\Application\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Src\Support\Domain\Models\File;
use Src\Support\Response\Domain\BaseResponse;

final class StoreFileController extends Controller
{
    public function __invoke(Request $request): JsonResponse
    {
        $response = new BaseResponse();

        $fileRequest = $request->file('files')[0];

        $file = new File();
        $file->type = $fileRequest->getClientMimeType();
        $file->extension =$fileRequest->getClientOriginalExtension();
        $file->storeFile($fileRequest);
        $file->save();

        $response->data = [
            'id' => $file->id,
            'path' => config('app.url') . $file->path,
        ];

        return new JsonResponse($response);
    }
}
