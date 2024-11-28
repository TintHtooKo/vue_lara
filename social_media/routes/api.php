<?php

use App\Http\Controllers\ActionLogController;
use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\PostController;
use App\Http\Controllers\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::post('user/login',[AuthController::class,'login']);
Route::post('user/register',[AuthController::class,'register']);

Route::get('category',[AuthController::class,'categoryList'])->middleware('auth:sanctum');
Route::get('allpost',[PostController::class,'allPost']);
Route::post('post/detail',[PostController::class,'postDetail']);

Route::get('allcategory',[CategoryController::class,'categoryList']);
Route::post('post/search',[CategoryController::class,'postSearch']);
Route::post('category/search',[CategoryController::class,'categorySearch']);

Route::post('post/actionlog',[ActionLogController::class,'setActionLog']);