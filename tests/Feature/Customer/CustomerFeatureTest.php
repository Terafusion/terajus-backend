<?php

namespace Tests\Feature\Customer;

use Tests\TestCase;
use App\Models\Customer\Customer;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\Response;

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
            'name' => 'Casado',
            'email' => 'tst@terafusion.com.br',
            'password' => '12345678',
            'nif_number' => '5496668777',
            'role' => 'customer',
            'person_type' => 'PERSONAL',
            'marital_status' => 'CASADO',
            'customer' => false
        ])
            ->assertStatus(Response::HTTP_CREATED)
            ->assertJsonFragment(['name' => 'Casado']);
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
}
