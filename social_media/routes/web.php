<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ListController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TrendPostController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    // Route::get('/dashboard', function () {
    //     return view('admin.profile.index');
    // })->name('dashboard');

    Route::get('dashboard',[ProfileController::class,'index'])->name('dashboard');
    Route::post('admin/update',[ProfileController::class,'updateAdmin'])->name('update#admin');


    Route::get('admin/list',[ListController::class, 'index'])->name('admin#list');
    Route::get('admin/delete/{id}',[ListController::class,'adminDelete'])->name('admin#delete');

    Route::get('category',[CategoryController::class, 'index'])->name('admin#category');
    Route::post('category/create',[CategoryController::class,'categoryCreate'])->name('category#create');
    Route::get('category/delete/{id}',[CategoryController::class,'categoryDelete'])->name('category#delete');
    Route::get('category/edit/{id}',[CategoryController::class,'categoryEditPage'])->name('category#editPage');
    Route::post('category/edit/{id}',[CategoryController::class,'categoryEdit'])->name('category#edit');

    Route::get('postPage',[PostController::class,'index'])->name('admin#post');
    Route::post('post/create',[PostController::class,'postCreate'])->name('admin#postCreate');
    Route::get('post/delete/{id}',[PostController::class,'postDelete'])->name('admin#postDelete');
    Route::get('post/edit/{id}',[PostController::class,'PostEditPage'])->name('admin#postEditPage');
    Route::post('post/edit/{id}',[PostController::class,'PostEdit'])->name('admin#postEdit');
    Route::get('trend/post',[TrendPostController::class,'index'])->name('admin#trend_post');
    Route::get('trend/post/detail/{id}',[TrendPostController::class,'trendDetail'])->name('admin#trend_postDetail');

    Route::get('change/password',[ProfileController::class,'changePasswordPage'])->name('change#password');
    Route::post('change/password',[ProfileController::class,'changePassword'])->name('change#passwordAdmin');

    
});
