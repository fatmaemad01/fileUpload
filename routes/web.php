<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FileController;
use App\Http\Controllers\ProfileController;

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

Route::get('/files/{user}', [FileController::class, 'index'])
    ->middleware('auth')
    ->name('files.index');

Route::get('/upload', [FileController::class, 'create'])
    ->name('file.create');

Route::post('/upload', [FileController::class, 'upload'])
    ->name('file.upload');

Route::get('/download/{Link:link}', [FileController::class, 'download'])
    ->middleware('signed')
    ->name('file.download');

Route::delete('/{file}', [FileController::class, 'destroy'])
    ->name('file.destroy');


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
