<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FileController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\PlanController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SubscriptionsController;
use App\Models\Subscription;

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
})->name('file.create');

Route::get('plans', [PlanController::class, 'index'])->name('plans');

Route::post('payment', [PaymentController::class, 'store'])
    ->middleware('auth')
    ->name('payments.store');

Route::get('/payments/{subscription}/success', [PaymentController::class, 'success'])
    ->name('payments.success');

Route::get('/payments/{subscription}/cancel', [PaymentController::class, 'cancel'])
    ->name('payments.cancel');

Route::get('/subscription/{subscription}/checkout', [PaymentController::class, 'create'])
    ->name('checkout');

Route::post('subscriptions', [SubscriptionsController::class, 'store'])
    ->name('subscriptions.store');

Route::get('/files/{user}', [FileController::class, 'index'])
    ->middleware(['auth', 'subscribed'])
    ->name('files.index');

Route::get('/file/detail/{File}', [FileController::class, 'show'])
    ->name('file.show');

Route::get('/download/page/{File}', [FileController::class, 'downloadPage'])
    ->name('file.downloadPage');

Route::post('/upload/new', [FileController::class, 'upload'])
    ->name('file.upload');

Route::get('download/{Link:link}', [FileController::class, 'download'])
    ->middleware('signed')
    ->name('file.download');

Route::delete('/{file}', [FileController::class, 'destroy'])
    ->name('file.destroy');


// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
