<?php

use App\Http\Controllers\AuthManager;
use App\Http\Controllers\CertificateController;
use App\Http\Controllers\FormationController;
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

// auth
Route::post("/login", [AuthManager::class, "login_post"])->name("login.post");
Route::post("/register", [AuthManager::class, "register_post"])->name("register.post");
Route::get("/user/{id}", [AuthManager::class, "find_user_by_id"])->name("user.find_by_id");

// formations
Route::post("/formation/create", [FormationController::class, "create_formation"])->name("formation.create");
Route::get("/formations", [FormationController::class, "get_all_formations"])->name("formations.get_all");
Route::get("/formations/{user_id}", [FormationController::class, "get_user_formations"])->name("formations.get_user");
Route::post("/formation/participate", [FormationController::class, "participate_in_formation"])->name("formations.participate");

// certificate
Route::post("/certificate/create", [CertificateController::class, "create_certificate"])->name("certificate.create");
Route::get("/certificates/{user_id}", [CertificateController::class, "get_user_certificates"])->name("certificates.get_user");
