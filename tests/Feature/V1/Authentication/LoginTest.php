<?php

namespace Tests\Feature\V1\Authentication;

use App\Models\User;
use Hash;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class LoginTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Tests for a successful login attempt.
     *
     * @return void
     */
    public function testSuccessfulLogin()
    {
        $user = User::factory()->create();
        $user->password = Hash::make('password');
        $user->save();

        $response = $this->post('/api/v1/auth/login', [
            'email' => $user->email,
            'password' => 'password'
        ]);

        $this->assertDatabaseHas('login_attempts', [
            'status' => 'passed'
        ]);

        $response->assertStatus(200)
            ->assertJson([
                'success' => true,
                'data' => [
                    'token' => true,
                    'user' => true,
                ],
            ]);
    }

    /**
     * Tests for a failed login attempt.
     *
     * @return void
     */
    public function testFailedLogin()
    {
        $credentials = [
            'email' => 'incorrect@email.com',
            'password' => 'wrong-password',
        ];

        $response = $this->postJson('/api/v1/auth/login', $credentials);

        $this->assertDatabaseHas('login_attempts', [
            'status' => 'failed',
            'credentials' => json_encode($credentials),
        ]);

        $response->assertStatus(401);
    }
}
