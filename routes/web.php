<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApplyController;
use App\Http\Controllers\Admin\JobController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\JobTypeController;
use App\Http\Controllers\Admin\ApplicantController;
use App\Http\Controllers\Auth\Admin\LoginController;

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


Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('job/details/{id}', [App\Http\Controllers\HomeController::class, 'view']);
Route::post('user/login', [App\Http\Controllers\Auth\LoginController::class, 'custom_login'])->name('user.login');

Route::group(['middleware' => ['auth']], function () {
    Route::get('apply/{id}',[ApplyController::class,'apply']);
});

Route::get('admin/dashboard', function () {
    return view('admin/dashboard');
});

Route::prefix('admin')->group(function() {
    Route::get('/login',[LoginController::class,'showLoginForm'])->name('admin.login');
    Route::post('/login', [LoginController::class,'login'])->name('admin.login.submit');
    Route::get('logout/', [LoginController::class,'logout'])->name('admin.logout');
    Route::get('dashboard', [AdminController::class,'index'])->name('admin.dashboard');
   }) ;
Route::group(['middleware'=>['assign.guard:admin,admin/login']],function(){
    Route::prefix('admin')->group(function () {
        Route::resource('job-type',JobTypeController::class);
        Route::resource('job',JobController::class);
        Route::get('job/status/{id}',[JobController::class,'status'])->name('job.status');
        Route::get('applicant',[ApplicantController::class,'index'])->name('applicant.index');
        Route::get('applicant/{id}',[ApplicantController::class,'view'])->name('applicant.view');
	});
});




