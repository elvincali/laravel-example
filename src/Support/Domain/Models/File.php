<?php

namespace Src\Support\Domain\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class File extends Model
{
    public function storeFile(UploadedFile $uploadedFile)
    {
        $path = Storage::disk('public')->putFile('products/images', $uploadedFile);
        $this->path = Storage::url($path);
    }

    public function removeFileFromDisk() {
        $pathInDisk = str_replace('/storage', '', $this->path);
        Storage::disk('public')->delete($pathInDisk);
    }
}
