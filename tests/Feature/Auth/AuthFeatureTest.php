<?php

namespace Tests\Feature\Auth;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\Response;
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
        $response = $this->post('/api/oauth/signup', ['name' => 'test', 'email' => 'emailtest@test.com', 'password' => '12345678'])
            ->assertStatus(Response::HTTP_OK)
            ->decodeResponseJson();
        $this->assertNotNull($response['access_token']);
    }
}
