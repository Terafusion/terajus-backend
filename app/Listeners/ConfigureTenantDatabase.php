<?php

namespace App\Listeners;

use Database\Seeders\EnvironmentSeeder;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Contracts\Queue\ShouldQueue;
use League\CommonMark\Environment\Environment;
use Tenancy\Facades\Tenancy;

class ConfigureTenantDatabase implements ShouldQueue
{
    use InteractsWithQueue;

    public function handle($event)
    {
        Tenancy::setTenant($event->tenant);
        if ($event->tenant->id != config('terajus.default_tenant.id')) {
            Artisan::call('db:seed', ['--class' => EnvironmentSeeder::class]);
        }
    }
}
