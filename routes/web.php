<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\AuthController;

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


Route::get("/", [ContactController::class, "all"]);
Route::get("/login",[AuthController::class, "page"]);
Route::post("/loginAuth",[AuthController::class, "auth"]);
Route::get("/diconnectAuth",[AuthController::class, "diconnectAuth"]);


Route::get("addcontact", [ContactController::class, "addContact"]);

Route::post("postContact",[ContactController::class,"postContact"])->middleware('auth');

Route::delete("deleteContact/{id}", [ContactController::class,"deleteContact"])->middleware('auth')->name("deleteContact");

Route::get("editContactForm/{id}",[ContactController::class, "editContactForm"]);

Route::put("editContact/{id}",[ContactController::class, "editContact"])->middleware('auth')->name("editContact");
