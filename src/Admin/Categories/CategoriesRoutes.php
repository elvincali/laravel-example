<?php

use Illuminate\Support\Facades\Route;
use Src\Admin\Categories\Application\Controllers\DestroyCategoryController;
use Src\Admin\Categories\Application\Controllers\EditCategoryController;
use Src\Admin\Categories\Application\Controllers\IndexCategoryController;
use Src\Admin\Categories\Application\Controllers\StoreCategoryController;
use Src\Admin\Categories\Application\Controllers\UpdateCategoryController;

Route::get('admin/categories', IndexCategoryController::class);
Route::post('admin/categories', StoreCategoryController::class);
Route::get('admin/categories/{id}/edit', EditCategoryController::class);
Route::put('admin/categories/{id}', UpdateCategoryController::class);
Route::delete('admin/categories/{id}', DestroyCategoryController::class);
