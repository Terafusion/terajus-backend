<?php

namespace App\Providers;

use Illuminate\Support\Facades\App;
use Illuminate\Routing\UrlGenerator;
use App\Models\Address\Address;
use App\Models\Customer\Customer;
use App\Models\Document\Document;
use App\Models\DocumentRequest\DocumentRequest;
use App\Models\LegalCase\LegalCase;
use App\Models\LegalPleading\LegalPleading;
use App\Models\LegalPleadingType\LegalPleadingType;
use App\Models\Permission\RoleHasPermission;
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
    public function boot(UrlGenerator $url)
    {

        if (App::environment() == 'production') {
            $url->forceScheme('https');
        }

        Customer::observe(TenantObserver::class);
        LegalCase::observe(TenantObserver::class);
        DocumentRequest::observe(TenantObserver::class);
        LegalPleading::observe(TenantObserver::class);
        LegalPleadingType::observe(TenantObserver::class);
        Address::observe(TenantObserver::class);
        RoleHasPermission::observe(TenantObserver::class);
        Document::observe(TenantObserver::class);
    }
}
