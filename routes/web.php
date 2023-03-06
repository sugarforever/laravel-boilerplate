<?php

use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Web3\Web3AuthController;
use Illuminate\Support\Facades\Auth;

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

Route::get('/metamask-login', function () {
    if (Auth::check()) {
        return redirect()->route("dashboard");
    }
    return view('auth.metamask-login');
})->name('metamask-login');

Route::get('/eth/signature', [Web3AuthController::class, 'signature'])->name('metamask.signature');
Route::post('/eth/authenticate', [Web3AuthController::class, 'authenticate'])->name('metamask.authenticate');

Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');

require __DIR__.'/auth.php';
