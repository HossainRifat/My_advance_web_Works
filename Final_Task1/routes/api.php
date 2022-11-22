<?php

use App\Http\Controllers\productCOntroller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get("/product/list",[productCOntroller::class, "AllProduct"]);
Route::post("/product/add",[productCOntroller::class, "AddProduct"]);