<?php

use App\Http\Controllers\Main\MainController;
use App\Http\Livewire\Admin\CategoryController;
use App\Http\Livewire\Admin\NewsController;
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

Route::middleware(['guest'])->group(function () {
    Route::get('/', MainController::class);
    Route::get('/news');
    Route::get('/news/{$id}');

});
Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified'])
    ->group(function () {
//        Route::get('/', MainController::class);
//        Route::get('/news');
//        Route::get('/news/{$id}');
        Route::get('/dashboard', function () {
            return view('dashboard');
        })->name('dashboard');
    });

//Route::middleware(['auth:sanctum', 'role:admin', 'prefix' => 'admin', 'as' => 'admin.'])->group(function () {
//    Route::get('/admin', AdminController::class)
//        ->name('admin');
//    Route::resource('/categories', CategoriesController::class);
//    Route::resource('/news', NewsController::class);
//});
Route::get('/admin', function (){
    return view('livewire.admin.index');
})->name('admin');
Route::get('/categories', CategoryController::class);
Route::get('/news', NewsController::class);
