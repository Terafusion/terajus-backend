<?php

namespace Tests\Feature\Address;

use App\Models\Address\Address;
use App\Models\User\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\Response;
use Tests\TestCase;

class AddressFeatureTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    public function setUp(): void
    {
        parent::setUp();
    }

    /**
     * Test retrieve all addresses
     *
     * @return void
     */
    public function test_index_addresses()
    {
        $address = Address::factory()->create(['addressable_type' => User::class, 'addressable_id' => $this->user->id, 'user_id' => $this->user->id]);
        $this->get('api/addresses')->assertStatus(Response::HTTP_OK)->assertJsonFragment(['street' => $address->street])->assertJsonCount(3, 'data');
    }

    /**
     * Test retrieve specific address
     *
     * @return void
     */
    public function test_show_address()
    {
        $user = User::factory()->create(['name' => 'test']);
        $address = Address::factory()->create(['addressable_type' => User::class, 'addressable_id' => $user->id, 'user_id' => $user->id]);
        $this->get('api/addresses/'.$address->id)->assertStatus(Response::HTTP_OK)->assertJsonFragment(['street' => $address->street]);
    }

    /**
     * Testa a store an address
     *
     * @return void
     */
    public function test_store_address()
    {
        $data = [
            'addressable_type' => User::class,
            'addressable_id' => $this->user->id,
            'street' => $this->faker->streetName,
            'number' => $this->faker->buildingNumber,
            'district' => $this->faker->citySuffix,
            'city' => $this->faker->city,
            'state' => 'BA',
            'country' => $this->faker->country,
            'complement' => $this->faker->secondaryAddress,
            'zip_code' => $this->faker->postcode,
        ];

        $response = $this->postJson('/api/addresses', $data);

        $response->assertStatus(201);
        $this->assertDatabaseHas('addresses', $data);
    }

    /**
     * Testa update an address
     *
     * @return void
     */
    public function test_update_address()
    {
        $address = Address::factory()->create();

        $newData = [
            'addressable_type' => User::class,
            'addressable_id' => $this->user->id,
            'street' => $this->faker->streetName,
            'number' => $this->faker->buildingNumber,
            'district' => $this->faker->citySuffix,
            'city' => $this->faker->city,
            'state' => 'BA',
            'country' => $this->faker->country,
            'complement' => $this->faker->secondaryAddress,
            'zip_code' => '48970000',
        ];

        $response = $this->put("/api/addresses/{$address->id}", $newData);
        $address->refresh();
        $response->assertStatus(200);
        $this->assertDatabaseHas('addresses', ['zip_code' => '48970000', 'tenant_id' => $this->user->tenant_id]);
    }
}
