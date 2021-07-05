<?php

namespace Src\Admin\Products\Domain\Repositories;

use Illuminate\Support\Facades\DB;

final class ProductRepository
{
    public function index(int $perPage)
    {
        return DB::table('products as p')
            ->select(['p.id', 'p.name', 'p.code', 'p.price', 'c.name'])
            ->join('category as c', 'c.id', '=', 'p.category_id')
            ->where('p.state', true)
            ->paginate($perPage);
    }
}
