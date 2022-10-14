<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\GlobalController;
use App\Http\Controllers\UserController;
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

Route::get('/',[GlobalController::class,'Home'])->name("Home");

Route::get('/login',[GlobalController::class,'Login'])->name("Login");
Route::post('/login',[GlobalController::class,'LoginSubmit'])->name("LoginSubmit");

Route::get('/registration/{id}',[GlobalController::class,'Registration'])->name("RegistrationUser");
Route::get('/registration/{id}',[GlobalController::class,'Registration'])->name("RegistrationAdmin");

Route::post('/registration/user',[UserController::class,'RegSubmit'])->name("UserSubmit");
Route::post('/registration/admin',[AdminController::class,'RegSubmit'])->name("AdminSubmit");