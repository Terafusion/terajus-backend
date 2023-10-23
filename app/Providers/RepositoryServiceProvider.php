<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->bind(\App\Repositories\User\UserRepository::class, \App\Repositories\User\UserRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\LegalCase\LegalCaseRepository::class, \App\Repositories\LegalCase\LegalCaseRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\LegalCase\LegalCaseParticipantRepository::class, \App\Repositories\LegalCase\LegalCaseParticipantRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\Evidence\EvidenceRepository::class, \App\Repositories\Evidence\EvidenceRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\DocumentType\DocumentTypeRepository::class, \App\Repositories\DocumentType\DocumentTypeRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\DocumentRequest\DocumentRequestRepository::class, \App\Repositories\DocumentRequest\DocumentRequestRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\DocumentRequestDoc\DocumentRequestDocRepository::class, \App\Repositories\DocumentRequestDoc\DocumentRequestDocRepositoryEloquent::class);
    }
}
