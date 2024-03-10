<?php

use App\Http\Controllers\Address\AddressController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Customer\CustomerController;
use App\Http\Controllers\Document\DocumentController;
use App\Http\Controllers\DocumentRequest\DocumentRequestController;
use App\Http\Controllers\DocumentType\DocumentTypeController;
use App\Http\Controllers\Evidence\EvidenceController;
use App\Http\Controllers\LegalCase\LegalCaseController;
use App\Http\Controllers\LegalPleadingType\LegalPleadingTypeController;
use App\Http\Controllers\ParticipantType\ParticipantTypeController;
use App\Http\Controllers\User\UserController;
use Illuminate\Support\Facades\Route;
use Laravel\Passport\Http\Controllers\AccessTokenController;

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
    Route::apiResource('customers', CustomerController::class)->middleware('identify.tenant');
    Route::apiResource('legal-cases', LegalCaseController::class)->middleware('identify.tenant');;
    Route::apiResource('evidences', EvidenceController::class)->middleware('identify.tenant');
    Route::apiResource('document-requests', DocumentRequestController::class)->middleware('identify.tenant');
    Route::apiResource('documents', DocumentController::class);
    Route::get('/documents/download/{document}', [DocumentController::class, 'download'])->name('documents.download');
    Route::apiResource('document-types', DocumentTypeController::class);
    Route::apiResource('legal-pleading-types', LegalPleadingTypeController::class)->middleware('identify.tenant');;
    Route::apiResource('participant-types', ParticipantTypeController::class);
});

Route::post('/oauth/signup', [AuthController::class, 'signUp']);
Route::post('/oauth/token', [AccessTokenController::class, 'issueToken']);
