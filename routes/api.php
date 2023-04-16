<?php

use App\Http\Controllers\AuthManager;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post("/login", [AuthManager::class, "login_post"])->name("login.post");
Route::post("/register", [AuthManager::class, "register_post"])->name("register.post");
Route::get("/user/{id}", [AuthManager::class, "find_user_by_id"])->name("user.find_by_id");
Route::get("/user", [AuthManager::class, "find_user_by_email"])->name("user.find_by_id");
