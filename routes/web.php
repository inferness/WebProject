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


Route::get('/', [MainController::class, 'landingPage']);
Route::get('/home', [MainController::class, 'home'])->name('home');
Route::get('/saved', [MainController::class, 'savedPage']);
Route::get('/communities', [MainController::class, 'communities'])->name('communities');

Route::get('/profile', [MainController::class, 'profilePage'])->name('profile');
Route::post('/profileProcess', [MainController::class, 'profileForm'])->name('profileForm');

Route::get('/community/{communityId}', [MainController::class, 'communityPage'])->name('communityPage');
Route::get('post/{postId}', [MainController::class, 'postPage'])->name('postPage');

Route::get('/login', [MainController::class, 'login'])->name('login');
Route::post('/processLogin', [MainController::class, 'processLogin'])->name('processLogin');

Route::get('/register', [MainController::class, 'register'])->name('register');
Route::post('/processRegister', [MainController::class, 'processRegister'])->name('processRegister');

Route::get('/logout', [MainController::class, 'logout'])->name('logout');

Route::get('/createCommunity', [MainController::class, 'createCommunity'])->name('createCommunity');
Route::post('/createCommunityForm', [MainController::class, 'createCommunityForm'])->name('createCommunityForm');

Route::get('{communityId}/createPost', [MainController::class, 'createPost'])->name('createPost');
Route::post('{communityId}/createPostForm,', [MainController::class, 'createPostForm'])->name('createPostForm');
Route::get('deleteCommunity/{communityId}', [MainController::class, 'deleteCommunity'])->name('deleteCommunity');

Route::get('/follow/{communityId}', [MainController::class, 'followCommunity'])->name('follow');
Route::get('/unfollow/{communityId}', [MainController::class, 'unfollowCommunity'])->name('unfollow');

Route::get('/upvote/{id}', [MainController::class, 'upvotePost'])->name('upvotePost');
Route::get('/downvote/{id}', [MainController::class, 'downvotePost'])->name('downvotePost');

Route::get('/save/{id}', [MainController::class, 'savePost'])->name('savePost');
Route::get('/unsave/{id}', [MainController::class, 'unsavePost'])->name('unsavePost');

