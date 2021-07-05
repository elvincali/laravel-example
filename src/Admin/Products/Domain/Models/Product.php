<?php

namespace Src\Admin\Products\Domain\Models;

use Illuminate\Database\Eloquent\Model;
use Src\Support\Domain\Models\File;

class Product extends Model
{
    public function files()
    {
        return $this->belongsToMany(File::class);
    }
}
