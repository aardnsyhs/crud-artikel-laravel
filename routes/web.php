<?php

use App\Http\Controllers\articleController;
use App\Http\Controllers\dashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\loginController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\registerController;
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

Route::get('/dashboard', [dashboardController::class, 'index'])->middleware('auth');
// Route::resource('/category')
Route::get('/', [HomeController::class, 'index'])->middleware('guest');

Route::get('/register', [registerController::class, 'index'])->name('register');
Route::post('/regist', [registerController::class, 'store'])->name('register.store');

Route::post('/logout', [loginController::class, 'logout'])->name('logout');

Route::get('/login', [loginController::class, 'index'])->name('login');
Route::post('/log', [loginController::class, 'login'])->name('login.store');

// Article
Route::get('/article', [articleController::class, 'index'])->name('article.index');
Route::get('/article/create', [ArticleController::class, 'create'])->middleware('auth')->name('article.create');
Route::post('/article/store', [ArticleController::class, 'store'])->middleware('auth')->name('article.store');
Route::get('/article/{id}/edit', [ArticleController::class, 'edit'])->middleware('auth')->name('article.edit');
Route::post('/article/{id}', [ArticleController::class, 'update'])->middleware('auth')->name('article.update');
Route::get('/article/show/{id}', [ArticleController::class, 'show'])->middleware('auth')->name('article.show');
Route::get('/article/destroy/{id}', [ArticleController::class, 'destroy'])->middleware('auth')->name('article.destroy');

// Profile routes
Route::get('/profile', [ProfileController::class, 'index'])->middleware('auth')->name('profile.index');
Route::get('/profile/article/{id}', [ProfileController::class, 'article'])->middleware('auth')->name('profile.article');
