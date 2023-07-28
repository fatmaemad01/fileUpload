<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FileController;

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


Route::get('/files', [FileController::class, 'index'])
    ->name('files.index');

Route::get('/', [FileController::class, 'create'])
    ->name('file.create');

Route::post('/upload', [FileController::class, 'upload'])
    ->name('file.upload');

Route::get('/download/{Link:link}', [FileController::class, 'download'])
    ->middleware('signed')
    ->name('file.download');

Route::delete('/{file}', [FileController::class, 'destroy'])
    ->name('file.destroy');
