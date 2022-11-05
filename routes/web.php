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
    return redirect()->route('posts.index');
});

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';


Route::post('/posts/{post}/status', [\App\Http\Controllers\PostController::class, 'updateStatus'])
    ->name('posts.status.update');

// Route::get('/pages', [\App\Http\Controllers\PageController::class, 'index'])
//     ->name('pages.index');
Route::get('/tools/{tool}/update', [\App\Http\Controllers\ToolController::class, 'showUpdateTool'])
    ->name('tools.update.quantity');
Route::post('/tools/{tool}/updatequantity',[\App\Http\Controllers\ToolController::class, 'updateToolQuantity'])
->name('tools.update.history');

Route::resource('/posts', \App\Http\Controllers\PostController::class);

Route::resource('/user', \App\Http\Controllers\UserController::class);
Route::resource('/tools', \App\Http\Controllers\ToolController::class);
Route::resource('/historys', \App\Http\Controllers\HistoryController::class);