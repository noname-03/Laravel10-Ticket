<?php

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
    return redirect()->route("login");
});
Route::get('auth/{provider}', [App\Http\Controllers\Auth\LoginController::class, 'redirectToProvider'])->name('login.social');
Route::get('auth/{provider}/callback', [App\Http\Controllers\Auth\LoginController::class, 'handleProviderCallback'])->name('login.social.callback');
Auth::routes();

Route::middleware(['auth'])->group(function () {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::resource('eventType', App\Http\Controllers\EventTypeController::class);
    Route::resource('event', App\Http\Controllers\EventController::class);
    Route::get('payment/{event}', [App\Http\Controllers\PaymentController::class, 'index'])->name('payment.index');
    Route::post('payment/{event}/store', [App\Http\Controllers\PaymentController::class, 'store'])->name('payment.store');
    Route::resource('ticket', App\Http\Controllers\TicketController::class);
    Route::get('user/{user}', [App\Http\Controllers\UserController::class, 'show'])->name('user.show');
    Route::get('user/{user}/update/role', [App\Http\Controllers\UserController::class, 'role'])->name('user.role');
});