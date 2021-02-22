<?php

use App\Http\Controllers\AllJobsController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FrontJobsController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\JobController;
use App\Http\Controllers\UserJobController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\WelcomeController;
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


Route::get('/alll',[FrontJobsController::class, 'index'])->name('alll');

Route::get('/users/{user}/jobs', [UserJobController::class, 'index'])->name('users.jobs');

Route::get('/', [WelcomeController::class, 'index'])->name('welcome');



Auth::routes(['verify'=>true]);


Route::group(['middleware'=>'auth'],function (){
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::resource('/categories',CategoriesController::class);
});
Route::resource('/jobs',JobController::class);

Route::group(['middleware'=>'auth','admin'],function (){
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
Route::get('/users',[UsersController::class, 'index'])->name('users');
    Route::get('/alljobs',[AllJobsController::class, 'index'])->name('alljobs');

});

