<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\postController;
use App\Http\Controllers\profileController;
use App\Http\Controllers\redrecteController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/registre' ,[redrecteController::class ,'index']);
Route::get('/connection',[redrecteController::class,'connection']);
Route::get('/dashboard',[redrecteController::class,'dashboard']);
Route::get('/reset',[redrecteController::class,'reset']);
Route::get('/Suggestions',[redrecteController::class,'Suggestions']);
Route::get('/index',[postController::class,'getAllPosts']);
Route::get('/logout', function () {
    Auth::logout();
    return redirect('/');
})->name('logout');

Route::get('/profile/{id}',[profileController::class,'ToProfile'])->name('consulteProfile');

Route::post('/registreForm',[AuthController::class,'store'])->name('registreForm');
Route::post('/connectionForm',[AuthController::class,'connection'])->name('connectionForm');
Route::post('/uploadImage',[profileController::class,'upload'])->name('uploadImage');
Route::post('/addPost',[postController::class,'store'])->name('poste.store');


Route::delete('/posts/{id}', [postController::class, 'destroy'])->name('posts.destroy');
Route::put('/posts/{id}', [postController::class, 'update'])->name('posts.update');


//


Route::get('/forgot-password', [redrecteController::class, 'showForgotPasswordForm'])->name('forgot.password');
Route::post('/forgot-password', [AuthController::class, 'sendResetLink'])->name('password.email');
// Route::get('/reset-password/{token}', [AuthController::class, 'showResetPasswordForm'])->name('password.reset');
Route::post('/reset-password', [AuthController::class, 'resetPassword'])->name('password.update');
