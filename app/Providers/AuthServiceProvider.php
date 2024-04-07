<?php

namespace App\Providers;

use App\Models\Customer\Customer;
use App\Models\LegalCase\LegalCase;
use App\Policies\CustomerPolicy;
use App\Policies\LegalCasePolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        LegalCase::class => LegalCasePolicy::class,
        Customer::class => CustomerPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

    }

    public function register()
    {
        //
    }
}
