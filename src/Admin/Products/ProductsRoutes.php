<?php

use Illuminate\Support\Facades\Route;
use Src\Admin\Products\Application\Controllers\CreateProductController;
use Src\Admin\Products\Application\Controllers\DestroyFileController;
use Src\Admin\Products\Application\Controllers\StoreFileController;
use Src\Admin\Products\Application\Controllers\StoreProductController;
use Src\Admin\Products\Application\Controllers\UpdateProductController;

Route::group(['middleware' => 'db-transaction:mysql'], function () {
    Route::post('admin/products', StoreProductController::class);
    Route::put('admin/products/{id}', UpdateProductController::class);
});

Route::get('admin/products/create', CreateProductController::class);
Route::post('files/store', StoreFileController::class);
Route::delete('files/destroy/{id}', DestroyFileController::class);
