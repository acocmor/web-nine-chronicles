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
Route::prefix('/')->middleware('admin')->group(function () {
    Route::get('/', [App\Http\Controllers\PlayerController::class, 'dashboard'])->name('index');

    Route::get('/server', [App\Http\Controllers\ServerController::class, 'server'])->name('server');
    Route::post('/server', [App\Http\Controllers\ServerController::class, 'postServer'])->name('postServer');
    Route::post('/version', [App\Http\Controllers\ServerController::class, 'postVersion'])->name('postVersion');
    Route::get('/version/{id}', [App\Http\Controllers\ServerController::class, 'changeVersion'])->name('changeVersion');
    Route::post('/version/{id}', [App\Http\Controllers\ServerController::class, 'editVersion'])->name('editVersion');
    Route::get('/version/delete/{id}', [App\Http\Controllers\ServerController::class, 'deleteVersion'])->name('deleteVersion');

    Route::get('/password', [App\Http\Controllers\PlayerController::class, 'password'])->name('password');
    Route::post('/password', [App\Http\Controllers\PlayerController::class, 'postPassword'])->name('postPassword');

    Route::get('/add', [App\Http\Controllers\PlayerController::class, 'add'])->name('add');
    Route::post('/add', [App\Http\Controllers\PlayerController::class, 'postAdd'])->name('postAdd');

    Route::get('/edit/{id}', [App\Http\Controllers\PlayerController::class, 'edit'])->name('edit');
    Route::post('/edit/{id}', [App\Http\Controllers\PlayerController::class, 'postEdit'])->name('postEdit');

    Route::get('/delete/{id}', [App\Http\Controllers\PlayerController::class, 'delete'])->name('delete');
});

Route::get('/login', [App\Http\Controllers\PlayerController::class, 'login'])->name('login');
Route::post('/login', [App\Http\Controllers\PlayerController::class, 'postLogin'])->name('post.login');

Route::get('/data', [App\Http\Controllers\DataController::class, 'get'])->name('data');
//Route::get('/data?p={random}', [App\Http\Controllers\DataController::class, 'get2'])->name('data2');


