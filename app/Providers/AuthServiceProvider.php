<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;

use App\Models\Customer\Customer;
use App\Models\LegalCase\LegalCase;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use App\Models\User\User;
use App\Policies\CustomerPolicy;
use App\Policies\LegalCasePolicy;
use Illuminate\Support\Facades\Route;
use Stancl\Tenancy\Middleware\InitializeTenancyByDomain;
use Stancl\Tenancy\Middleware\PreventAccessFromCentralDomains;use Laravel\Passport\Passport;

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
