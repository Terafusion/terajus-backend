<?php

namespace App\Providers;

use App\Models\Customer\Customer;
use App\Models\LegalCase\LegalCase;
use App\Models\Tenant\Tenant;
use App\Observers\TenantObserver;
use Illuminate\Support\ServiceProvider;
use Tenancy\Identification\Contracts\ResolvesTenants;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->register(RepositoryServiceProvider::class);

        $this->app->resolving(ResolvesTenants::class, function (ResolvesTenants $resolver) {
            $resolver->addModel(Tenant::class);
            return $resolver;
        });

    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Customer::observe(TenantObserver::class);
        LegalCase::observe(TenantObserver::class);
    }
}
