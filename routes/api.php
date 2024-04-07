<?php

use App\Http\Controllers\Address\AddressController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Customer\CustomerController;
use App\Http\Controllers\Document\DocumentController;
use App\Http\Controllers\DocumentRequest\DocumentRequestController;
use App\Http\Controllers\DocumentType\DocumentTypeController;
use App\Http\Controllers\Evidence\EvidenceController;
use App\Http\Controllers\LegalCase\LegalCaseController;
use App\Http\Controllers\LegalPleading\LegalPleadingController;
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

Route::post('/oauth/signup', [AuthController::class, 'signUp']);
Route::post('/oauth/token', [AccessTokenController::class, 'issueToken']);

Route::middleware(['auth:api'])->group(function () {
    Route::middleware('identify.tenant')->group(function () {
        Route::get('/users/me', [UserController::class, 'me'])->name('users.me');
        Route::apiResource('users', UserController::class);
        Route::apiResource('customers', CustomerController::class);

        Route::apiResource('addresses', AddressController::class);

        Route::apiResource('legal-pleadings', LegalPleadingController::class);
        Route::apiResource('legal-pleading-types', LegalPleadingTypeController::class);

        Route::apiResource('legal-cases', LegalCaseController::class);

        Route::apiResource('participant-types', ParticipantTypeController::class);

        Route::apiResource('evidences', EvidenceController::class);

        Route::apiResource('document-requests', DocumentRequestController::class);

        Route::apiResource('documents', DocumentController::class);
        Route::apiResource('document-types', DocumentTypeController::class);
        Route::get('/documents/{document}/download', [DocumentController::class, 'download'])->name('documents.download');
    });
});
