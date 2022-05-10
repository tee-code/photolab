<?php

use App\Http\Controllers\PhotoController;
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

Route::controller(PhotoController::class)->group(function(){
    Route::get('/', 'index')->name('index');
    Route::get('/dashboard', 'dashboard')->name('dashboard');
    Route::get('/upload', 'create')->name('upload');
    Route::post('/photos/photo', 'store')->name('photos.upload');
    Route::delete('/photos/{photo}', 'destroy')->name('photo.delete');
});

require __DIR__.'/auth.php';
