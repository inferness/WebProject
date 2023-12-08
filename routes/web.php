<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;

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

Route::get('/popular', function () {
    return view('popular');
});
Route::get('/saved', function () {
    return view('saved');
});
Route::get('/profile', function () {
    return view('profile');
});

Route::get('/', [MainController::class, 'home']);
Route::get('/home', [MainController::class, 'home'])->name('home');

Route::get('/community/{communityId}', [MainController::class, 'communityPage'])->name('communityPage');

Route::get('/login', [MainController::class, 'login'])->name('login');
Route::post('/processLogin', [MainController::class, 'processLogin'])->name('processLogin');

Route::get('/register', [MainController::class, 'register'])->name('register');
Route::post('/processRegister', [MainController::class, 'processRegister'])->name('processRegister');

Route::get('/logout', [MainController::class, 'logout'])->name('logout');

Route::get('/createCommunity', [MainController::class, 'createCommunity'])->name('createCommunity');
Route::post('/createCommunityForm', [MainController::class, 'createCommunityForm'])->name('createCommunityForm');

Route::get('{communityId}/createPost', [MainController::class, 'createPost'])->name('createPost');
Route::post('{communityId}/createPostForm,', [MainController::class, 'createPostForm'])->name('createPostForm');

