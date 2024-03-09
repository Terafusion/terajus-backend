<?php

namespace Tests\Feature\Address;

use App\Models\Address\Address;
use App\Models\User\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\Response;
use Tests\TestCase;

class AddressFeatureTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @return void
     */
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
        $address = Address::factory()->create(['addressable_type' => User::class, 'addressable_id' => $this->user->id]);
        $this->get('api/addresses')->assertStatus(Response::HTTP_OK)->assertJsonFragment(['street' => $address->street])->assertJsonCount(2);
    }

    /**
     * Test retrieve specific address
     * 
     * @return void
     */
    public function test_show_address()
    {
        $user = User::factory()->create(['name' => 'test']);
        $address = Address::factory()->create(['addressable_type' => User::class, 'addressable_id' => $user->id]);
        $this->get('api/addresses/' . $address->id)->assertStatus(Response::HTTP_OK)->assertJsonFragment(['street' => $address->street]);
    }
}
