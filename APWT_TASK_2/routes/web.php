<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\pagesController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login',[pagesController::class,'Login'])->name("/login");
Route::post('/login',[pagesController::class,'LoginSubmit'])->name("/login");
Route::get('/contact',[pagesController::class,'Contact']);
Route::get('/registration',[pagesController::class,'Registration'])->name("/reg");
Route::Post('/registration',[pagesController::class,'RegSubmit'])->name("/reg");