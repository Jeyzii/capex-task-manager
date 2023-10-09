<?php

use App\Http\Controllers\Auth\GoogleController;
use App\Http\Controllers\Auth\NewSocialUserSetPassword;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;

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

//task routes
Route::middleware('auth')->group(function () {
    Route::get('/', [TaskController::class, 'index'])->name('tasks');
    Route::get('/task/{id}', [TaskController::class, 'show'])->name('show-task');
    Route::get('/tasks/create', [TaskController::class, 'create'])->name('create-task');
    Route::post('/task', [TaskController::class, 'store'])->name('store-task');
    Route::get('/task/edit/{id}', [TaskController::class, 'edit'])->name('edit-task');
    Route::put('/task/{id}', [TaskController::class, 'update'])->name('update-task');
    Route::delete('/task/{id}', [TaskController::class, 'destroy'])->name('delete-task');
});

//authentication routes
Route::get('/login', [AuthController::class, 'showLogin']);
Route::post('/login', [AuthController::class, 'login'])->name('login');

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/register', [AuthController::class, 'showRegister']);
Route::post('/register', [AuthController::class, 'register'])->name('register');

Route::get('/login-google', [GoogleController::class, 'redirectToProvider'])->name('google.login');
Route::get('/auth/google/callback', [GoogleController::class, 'handleProviderCallback'])->name('google.login.callback');

Route::prefix('/')->middleware(['auth'])->group(function(){
    Route::get('set-password',[NewSocialUserSetPassword::class, 'index'])->name('set.password');
    Route::post('set-password',[NewSocialUserSetPassword::class, 'addPassword'])->name('add.password');
});