<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
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
Route::get("addcontact", [ContactController::class, "addContact"]);

Route::post("postContact",[ContactController::class,"postContact"]);

Route::delete("deleteContact/{id}", [ContactController::class,"deleteContact"]);

Route::get("editContactForm/{id}",[ContactController::class, "editContactForm"]);

Route::post("editContact",[ContactController::class, "editContact"]);
