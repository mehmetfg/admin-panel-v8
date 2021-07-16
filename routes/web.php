<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::prefix('admin')->group(function (){

    Route::resource('categories', App\Http\Controllers\Admin\CategoryController::class);
    Route::resource('fields', App\Http\Controllers\Admin\FieldController::class);
    Route::resource('imges', App\Http\Controllers\Admin\ImageController::class);
    Route::resource('users', App\Http\Controllers\Admin\UserController::class);
    Route::resource('contents', App\Http\Controllers\Admin\ContentController::class);

    Route::get('category/{category}', [App\Http\Controllers\Admin\CategoryController::class, 'show']    );

});
