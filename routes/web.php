<?php

use App\Http\Controllers\dashboardController;
use App\Http\Controllers\loginController;
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

// Route::get('/', function () {
//     return view('framework.master');
// });

Route::get('/dashboard', [dashboardController::class, 'index']);
Route::get('/', [loginController::class, 'index'])->name('login');
Route::post('/log', [loginController::class, 'login'])->name('login.store');
