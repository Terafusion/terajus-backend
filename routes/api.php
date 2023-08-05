<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\LegalCase\LegalCaseController;
use App\Http\Controllers\User\UserController;
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

Route::middleware(['auth:api'])->group(function () {
    Route::get('/users/me', [UserController::class, 'me'])->name('users.me');
    Route::apiResource('users', UserController::class);
    Route::apiResource('legal-cases', LegalCaseController::class);
});

Route::post('/oauth/signup', [AuthController::class, 'signUp']);
