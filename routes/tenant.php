<?php

declare(strict_types=1);

use Stancl\Tenancy\Middleware\InitializeTenancyByDomain;
use Stancl\Tenancy\Middleware\PreventAccessFromCentralDomains;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Document\DocumentController;
use App\Http\Controllers\DocumentRequest\DocumentRequestController;
use App\Http\Controllers\DocumentType\DocumentTypeController;
use App\Http\Controllers\Evidence\EvidenceController;
use App\Http\Controllers\LegalCase\LegalCaseController;
use App\Http\Controllers\ParticipantType\ParticipantTypeController;
use App\Http\Controllers\User\UserController;
use Illuminate\Support\Facades\Route;
use Stancl\Tenancy\Features\UserImpersonation;

/*
|--------------------------------------------------------------------------
| Tenant Routes
|--------------------------------------------------------------------------
|
| Here you can register the tenant routes for your application.
| These routes are loaded by the TenantRouteServiceProvider.
|
| Feel free to customize them however you want. Good luck!
|
*/

Route::middleware([
    'web',
    InitializeTenancyByDomain::class,
    PreventAccessFromCentralDomains::class,
])->group(function () {
    Route::get('/', function () {
        dd('asdf');

        return 'This is your multi-tenant application. The id of the current tenant is ' . tenant('id');
    });
});



Route::prefix('api')
    ->middleware([
        'api',
        InitializeTenancyByDomain::class,
        PreventAccessFromCentralDomains::class,
    ])->group(function () {
        Route::get('/impersonate/{token}', function ($token) {
            return UserImpersonation::makeResponse($token);
        });

        Route::middleware(['auth:api'])->group(function () {
            Route::get('/users/me', [UserController::class, 'me'])->name('users.me');
            Route::apiResource('users', UserController::class);
            Route::apiResource('legal-cases', LegalCaseController::class);
            Route::apiResource('evidences', EvidenceController::class);
            Route::apiResource('document-requests', DocumentRequestController::class);
            Route::apiResource('documents', DocumentController::class);
            Route::get('/documents/download/{document}', [DocumentController::class, 'download'])->name('documents.download');
        });

        Route::apiResource('document-types', DocumentTypeController::class);
        Route::apiResource('participant-types', ParticipantTypeController::class);
        Route::post('/oauth/signup', [AuthController::class, 'signUp']);
    });

