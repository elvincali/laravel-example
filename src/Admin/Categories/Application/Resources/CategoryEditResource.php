<?php

namespace Src\Admin\Categories\Application\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Src\Admin\Categories\Domain\Models\Category;

class CategoryEditResource extends JsonResource
{
    public function __construct(Category $resource)
    {
        parent::__construct($resource);
    }

    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name
        ];
    }
}
