<?php

namespace Tests\Feature\Auth;

use App\Models\User\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\Response;
use Laravel\Passport\Passport;
use Tests\TestCase;

class AuthFeatureTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $this->artisan('passport:install', ['-vvv' => true]);
    }

    public function test_signUp()
    {
        $response = $this->post('/api/oauth/signup', ['name' => 'test', 'email' => 'emailtest@test.com', 'password' => '12345678', 'nif_number' => '123456789', 'person_type' => 'PERSONAL'])
            ->assertStatus(Response::HTTP_OK)
            ->decodeResponseJson();
        $this->assertNotNull($response['access_token']);
    }

    public function test_login()
    {
        $user = User::factory()->create(['email' => 'emailtest@test.com', 'password' => '12345678']);
        $client = Passport::clientModel()::where('password_client', true)->first();
        $response = $this->post('/oauth/token', [
            'username' => $user->email,
            'password' => '12345678',
            'grant_type' => 'password',
            'client_id' => $client->id,
            'client_secret' => $client->secret
        ])
            ->assertStatus(Response::HTTP_OK);
        $this->assertNotNull($response['refresh_token']);
    }
}
