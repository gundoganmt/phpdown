<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DownloadController;
use App\Http\Controllers\ProxyController;
use App\Http\Controllers\ExtractorController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\RegisterController;

Route::get('/', function () {
    return view('home', [
        'dw' => request('downloader')
    ]);
})->name('home');

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
Route::get('/latest_downloads', [DashboardController::class, 'latest'])->name('latest');

Route::get('/manage_admins', [DashboardController::class, 'manageIndex'])->name('manage_admins');
Route::post('/manage_admins', [DashboardController::class, 'manageStore']);

Route::get('/faq', [DashboardController::class, 'faqIndex'])->name('faq');
Route::post('/faq', [DashboardController::class, 'faqStore']);



Route::get('/proxy_list', [ProxyController::class, 'index'])->name('proxy_list');
Route::post('/proxy_list', [ProxyController::class, 'store']);




Route::post('/extractor', [ExtractorController::class, 'index'])->name('extractor');

Route::post('/logout', [LogoutController::class, 'store'])->name('logout');

Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'store']);

Route::get('/register', [RegisterController::class, 'index'])->name('register');
Route::post('/register', [RegisterController::class, 'store']);

///////////Route::get('/download', [DownloadController::class, 'index'])->name('download');
// Route::get('/posts/{post}', [PostController::class, 'show'])->name('posts.show');
// Route::post('/posts', [PostController::class, 'store']);
// Route::delete('/posts/{post}', [PostController::class, 'destroy'])->name('posts.destroy');

Route::post('/posts/{post}/likes', [PostLikeController::class, 'store'])->name('posts.likes');
Route::delete('/posts/{post}/likes', [PostLikeController::class, 'destroy'])->name('posts.likes');