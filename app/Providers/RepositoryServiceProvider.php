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
        $this->app->bind(\App\Repositories\Document\DocumentTypeRepository::class, \App\Repositories\Document\DocumentTypeRepositoryEloquent::class);
    }
}
