<?php

use App\Http\Controllers\LinkController;
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
Route::get('/links', [LinkController::class, 'index'] )->name('links.index');
Route::get('/links/create', [LinkController::class, 'create'] )->name('links.create');
Route::get('/links/{id}/edit', [LinkController::class, 'edit'] )->name('links.edit');
Route::put('/links/update/{id}', [LinkController::class, 'update'] )->name('links.update');
Route::post('/links/store', [LinkController::class, 'store'] )->name('links.store');
Route::delete('/links/{id}', [LinkController::class, 'destroy'] )->name('links.destroy');
Route::get('/{short_link}', [LinkController::class, 'redirect'])->name("redirect");
