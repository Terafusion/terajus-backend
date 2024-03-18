<?php

namespace Tests\Feature\Customer;

use App\Models\Customer\Customer;
use App\Models\Tenant\Tenant;
use App\Models\User\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\Response;
use Laravel\Passport\Passport;
use Tests\TestCase;

class CustomerFeatureTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Test retrieve all customers
     *
     * @return void
     */
    public function test_index_customers()
    {
        $this->assignRoles('lawyer', $this->user);

        $customer = Customer::factory()->create(['name' => 'Customer1', 'tenant_id' => $this->user->tenant_id]);
        $this->get('api/customers')
            ->assertStatus(Response::HTTP_OK)
            ->assertJsonFragment(['name' => $customer->name])
            ->assertJsonCount(1, 'data');
    }

    /**
     * Test retrieve specific customer
     *
     * @return void
     */
    public function test_show_customer()
    {
        $this->assignRoles('lawyer', $this->user);

        $customer = Customer::factory()->create(['name' => 'Customer2', 'tenant_id' => $this->user->tenant_id]);
        $this->get('api/customers/' . $customer->id)
            ->assertStatus(Response::HTTP_OK)
            ->assertJsonFragment(['name' => $customer->name]);
    }

    /**
     * Test store a customer
     *
     * @return void
     */
    public function test_store_customer()
    {
        $this->assignRoles('lawyer', $this->user);

        $this->post('api/customers', [
            'name' => 'Gabriel',
            'email' => 'tst@terajus.com.br',
            'password' => '12345678',
            'nif_number' => '5496668777',
            'role' => 'customer',
            'person_type' => 'PERSONAL',
            'marital_status' => 'CASADO',
            'is_customer' => true,
        ])
            ->assertStatus(Response::HTTP_CREATED)
            ->assertJsonFragment(['name' => 'Gabriel']);

        $this->assertDatabaseHas('customers', ['tenant_id' => $this->user->tenant_id, 'nif_number' => '5496668777']);
    }

    /**
     * Test store a customer that not belongs to current tenant
     *
     * @return void
     */
    public function test_store_customer_that_not_belongs_to_current_tenant()
    {
        $this->assignRoles('lawyer', $this->user);

        $this->post('api/customers', [
            'name' => 'Gabriel',
            'email' => 'tst@terajus.com.br',
            'password' => '12345678',
            'nif_number' => '5496668777',
            'role' => 'customer',
            'person_type' => 'PERSONAL',
            'marital_status' => 'CASADO',
            'is_customer' => false,
        ])
            ->assertStatus(Response::HTTP_CREATED)
            ->assertJsonFragment(['name' => 'Gabriel']);

        $this->assertDatabaseHas(
            'customers',
            [
                'tenant_id' => config('terajus.default_tenant.id'),
                'nif_number' => '5496668777',
                'user_id' => $this->user->id,
            ]
        );
    }

    /**
     * Test update a customer
     *
     * @return void
     */
    public function test_update_customer()
    {
        $this->assignRoles('lawyer', $this->user);

        $customer = Customer::factory()->create(['name' => 'Customer3', 'tenant_id' => $this->user->tenant_id]);
        $this->put('api/customers/' . $customer->id, ['name' => 'UpdatedName'])
            ->assertStatus(Response::HTTP_OK)
            ->assertJsonFragment(['name' => 'UpdatedName']);
    }

    /**
     * Test delete a customer
     *
     * @return void
     */
    public function test_delete_customer()
    {
        $this->assignRoles('lawyer', $this->user);

        $customer = Customer::factory()->create(['name' => 'Customer4']);
        $this->delete('api/customers/' . $customer->id)
            ->assertStatus(Response::HTTP_OK)
            ->assertJsonFragment(['message' => 'Success']);
    }

    /** @test */
    public function test_prevents_duplicate_nif_number_for_non_default_tenants()
    {
        Customer::factory()->create(['nif_number' => '123', 'tenant_id' => $this->user->tenant_id]);

        $response = $this->post('api/customers', [
            'name' => 'Gabriel',
            'email' => 'tst@terajus.com.br',
            'password' => '12345678',
            'nif_number' => '123',
            'role' => 'customer',
            'person_type' => 'PERSONAL',
            'marital_status' => 'CASADO',
            'is_customer' => false,
        ]);

        $response->assertStatus(Response::HTTP_UNPROCESSABLE_ENTITY);
    }
}
