<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\MainController;
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

Route::get('/', [MainController::class, 'index'])->middleware('auth')->name('home');

Route::get('/login', [AuthController::class, 'login'])->middleware('guest')->name('login');
Route::get('/register', [AuthController::class, 'register'])->middleware('guest')->name('register');
Route::get('/logout', [AuthController::class, 'logout'])->middleware('auth')->name('logout');

Route::get('/profile/{username}', [MainController::class, 'profile'])->middleware('auth')->name('profile.username');
Route::get('/comments/{id}', [MainController::class, 'comments'])->middleware('auth');
Route::get('/{username}', [MainController::class, 'profileUsers'])->middleware('auth');
Route::get('/{username}/followers', [MainController::class, 'profileUsersFollowers'])->middleware('auth');
Route::get('/{username}/followings', [MainController::class, 'profileUsersFollowings'])->middleware('auth');

