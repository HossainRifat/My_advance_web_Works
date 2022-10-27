<?php

use App\Http\Controllers\BuyerController;
use App\Http\Controllers\GlobalController;
use App\Http\Controllers\LoginController;
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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [GlobalController::class, 'Home'])->name("Home");

Route::get('/login', [LoginController::class, 'Login'])->name("Login");
Route::post('/login', [LoginController::class, 'LoginSubmit'])->name("LoginSubmit");

Route::get('/registration/{id}', [GlobalController::class, 'Registration'])->name("Registration");
Route::post('/registration/buyer', [BuyerController::class, 'RegistrationSubmit'])->name("RegistrationSubmit");

Route::get('/registration02/buyer', [BuyerController::class, 'Registration02'])->name("Registration02")->middleware('ValidReg02');
Route::post('/registration02/buyer', [BuyerController::class, 'Registration02Submit'])->name("Registration02Submit");

Route::get('/registration03/buyer', [BuyerController::class, 'Registration03'])->name("Registration03")->middleware('ValidReg03');
Route::post('/registration03/buyer', [BuyerController::class, 'Registration03Submit'])->name("Registration03Submit");
