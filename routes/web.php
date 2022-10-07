<?php

use App\Http\Controllers\User\CheckoutController;
use App\Http\Controllers\User\DashboardController as UserDashboard;
use App\Http\Controllers\Admin\DashboardController as AdminDashboard;
use App\Http\Controllers\Admin\CheckoutController as AdminCheckout;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\HomeController;

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
})->name('welcome');

//socialite routes
Route::get('sign-in-google', [UserController::class, 'google'])->name(
    'user.login.google'
);

Route::get('auth/google/callback', [
    UserController::class,
    'handleProviderCallback',
])->name('user.google.callback');

//midtrans routes
Route::get('payment/success', [CheckoutController::class, 'midtransCallback']);
Route::post('payment/success', [CheckoutController::class, 'midtransCallback']);

Route::middleware(['auth'])->group(function () {
    Route::get('dashboard', [HomeController::class, 'dashboard'])->name(
        'dashboard'
    );

    Route::prefix('user/dashboard')
        ->namespace('User')
        ->name('user.')
        ->middleware('ensureUserRole:user')
        ->group(function () {
            //dashboard user
            Route::get('/', [UserDashboard::class, 'index'])->name('dashboard');
        });

    Route::prefix('admin/dashboard')
        ->namespace('Admin')
        ->name('admin.')
        ->middleware('ensureUserRole:admin')
        ->group(function () {
            //dashboard admin
            Route::get('/', [AdminDashboard::class, 'index'])->name(
                'dashboard'
            );

            //admin checkout
            Route::post('checkout/{checkout}', [
                AdminCheckout::class,
                'update',
            ])->name('checkout.update');
        });

    //checkout routes
    Route::get('checkout/success', [CheckoutController::class, 'success'])
        ->name('checkout.success')
        ->middleware('ensureUserRole:user');

    Route::get('checkout/{camp:slug}', [CheckoutController::class, 'create'])
        ->name('checkout.create')
        ->middleware('ensureUserRole:user');

    Route::post('checkout/{camp}', [CheckoutController::class, 'store'])
        ->name('checkout.store')
        ->middleware('ensureUserRole:user');
});

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })
//     ->middleware(['auth'])
//     ->name('dashboard');

require __DIR__ . '/auth.php';
