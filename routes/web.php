<?php

use App\Http\Controllers\AlbumController;
use App\Http\Controllers\ChangePasswordController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DashboardUserController;
use App\Http\Controllers\ForgotPasswordController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PhotoController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect('/photos');
});

Route::get('/photos', [PhotoController::class, 'index']);
Route::get('/albums', [AlbumController::class, 'index']);

Route::group(['middleware' => 'guest'], function () {
    Route::get('/register', [RegisterController::class, 'index']);
    Route::post('/register', [RegisterController::class, 'store']);
    Route::get('/login', [LoginController::class, 'index'])->name('login');
    Route::post('/login', [LoginController::class, 'authenticate']);
    Route::get('forgot-password', [ForgotPasswordController::class, 'index']);
});

Route::group(['middleware' => ['auth', 'nocache']], function () {
    Route::resource('/photos', PhotoController::class)->except(['index']);
    Route::post('/photos/{photo}/like', [LikeController::class, 'like']);
    Route::post('/photos/{photo}/comment', [CommentController::class, 'post_comment']);

    Route::resource('/albums', AlbumController::class)->except(['index']);

    Route::group(['middleware' => 'admin'], function () {
        Route::get('/dashboard', [DashboardController::class, 'index']);
        Route::get('/dashboard/photos', [DashboardController::class, 'photos']);
        Route::get('/dashboard/albums', [DashboardController::class, 'albums']);
        Route::resource('/dashboard/users', DashboardUserController::class)->except(['show', 'edit', 'update']);
    });

    Route::post('/logout', [LoginController::class, 'logout']);
    Route::get('/u/{user:username}', [ProfileController::class, 'index']);
    Route::get('/u/{user:username}/albums', [ProfileController::class, 'albums']);
    Route::get('/u/{user:username}/likes', [ProfileController::class, 'likes']);
    Route::get('/change-password', [ChangePasswordController::class, 'index']);
    Route::post('/change-password', [ChangePasswordController::class, 'store']);
});
