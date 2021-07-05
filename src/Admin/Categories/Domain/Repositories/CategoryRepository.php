<?php

namespace Src\Admin\Categories\Domain\Repositories;

use Illuminate\Support\Facades\DB;

class CategoryRepository
{
    public function index(int $perPage)
    {
        return DB::table('categories')
            ->select(['id', 'name'])
            ->where('state', true)
            ->orderBy('id', 'desc')
            ->paginate($perPage);
    }
}
