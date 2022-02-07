<?php

use Illuminate\Support\Facades\Route;
use App\Models\User;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\BrandController;



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

Route::get('/category/all', [CategoryController::class, 'category']) ->name('all.category');

Route::post('/Store/Category', [CategoryController::class, 'addcat']) ->name('store.category');

Route::get('category/edit/{id}', [CategoryController::class, 'catedit']);


Route::post('update/category/{id}', [CategoryController::class, 'catupdate']);

Route::get('softdelete/category/{id}', [CategoryController::class, 'catdelete']);

Route::get('category/restore/{id}', [CategoryController::class, 'catrestore']);
Route::get('category/pdelete/{id}', [CategoryController::class, 'delete']);

Route::get('/Images/Brand', [BrandController::class, 'allbrand']) ->name('all.brand');
Route::post('/Store/brand', [BrandController::class, 'addbrand']) ->name('store.brand');






Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {

    $users = User::all();
    return view('dashboard' , compact('users'));
})->name('dashboard');
