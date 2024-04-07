<?php

namespace Tests;

use App\Models\Tenant\Tenant;
use App\Models\User\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;
use Laravel\Passport\Passport;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication, RefreshDatabase;

    /** @var User */
    protected $user;

    /**
     * Set up the test
     */
    public function setUp(): void
    {
        parent::setUp();
        $this->artisan('db:seed');
        $this->withHeaders(['Accept' => 'application/json']);
        $this->associateUserWithTenant();
    }

    /**
     * Associar o usuário a um Tenant
     */
    private function associateUserWithTenant()
    {
        $this->user = User::factory()->create();

        if ($this->shouldAssociateWithTenant()) {
            $tenant = Tenant::factory()->create();
            $this->user->tenant_id = $tenant->id;
            $this->user->is_tenant = true;
            $this->user->save();
            $this->user->refresh();
        }

        Passport::actingAs($this->user);
    }

    /**
     * Determina se o usuário deve ou não estar associado a um tenant
     *
     * @return bool
     */
    private function shouldAssociateWithTenant()
    {
        return true;
    }

    /**
     * Determina se o usuário deve ou não estar associado a uma role
     *
     * @return void
     */
    protected function assignRoles(mixed $roles, User $user)
    {
        $user->assignRole($roles);
    }
}
