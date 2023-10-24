<?php

namespace Tests\Feature\User;

// use Illuminate\Foundation\Testing\RefreshDatabase;

use App\Models\User\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\Response;
use Laravel\Passport\Passport;
use Tests\TestCase;

class UserFeatureTest extends TestCase
{
    use RefreshDatabase;

    /** @var User */
    private $user;

    /**
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $this->user = User::factory()->create();
        Passport::actingAs($this->user);
    }

    /**
     * Test retrieve all users
     * 
     * @return void
     */
    public function test_index_users()
    {
        User::factory()->create(['name' => 'xpto']);
        $this->get('api/users')->assertStatus(Response::HTTP_OK)->assertJsonFragment(['name' => $this->user->name])->assertJsonCount(2);
    }

    /**
     * Test retrieve specific user
     * 
     * @return void
     */
    public function test_show_user()
    {
        $user = User::factory()->create(['name' => 'test']);
        $this->get('api/users/' . $user->id)->assertStatus(Response::HTTP_OK)->assertJsonFragment(['name' => $user->name]);
    }

    /**
     * Test store an user
     *
     * @return void
     */
    public function test_store_user()
    {
        $data = [
            'name' => 'test',
            'email' => 'test@example.com',
            'password' => '12345678',
            'person_type' => 'PERSONAL',
            'nif_number' => '12345678',
            'address' => [
                'street' => '123 Main St',
                'number' => '42',
                'district' => 'Downtown',
                'city' => 'Cityville',
                'state' => 'BA',
                'country' => 'US',
                'complement' => 'Apt 101',
                'zip_code' => '12345',
            ],
        ];

        $response = $this->post('api/users', $data);

        $response->assertStatus(Response::HTTP_CREATED)
            ->assertJsonFragment(['name' => 'test']);
    }

    /**
     * Test update a user
     * 
     * @return void
     */
    public function test_update_user()
    {
        $user = User::factory()->create(['name' => 'test']);
        $this->put('api/users/' . $user->id, ['name' => 'xpto'])->assertStatus(Response::HTTP_OK)->assertJsonFragment(['name' => 'xpto']);
    }

    /**
     * Test delete a user
     * 
     * @return void
     */
    public function test_delete_user()
    {
        $user = User::factory()->create(['name' => 'test']);
        $this->delete('api/users/' . $user->id)->assertStatus(Response::HTTP_OK)->assertJsonFragment(['message' => 'Success']);
    }
}
