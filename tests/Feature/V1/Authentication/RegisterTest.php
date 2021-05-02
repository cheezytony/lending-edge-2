<?php

namespace Tests\Feature\V1\Authentication;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class RegisterTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Test successful user account registration.
     *
     * @return void
     */
    public function testSuccessfulRegistration()
    {
        $payload = [
            'first_name' => 'FirstName',
            'middle_name' => 'MiddleName',
            'last_name' => 'LastName',
            'email' => random_int(000000, 999999).'@unique_email.com',
            'phone' => '+234810'.random_int(00000000, 999999999),
            'date_of_birth' => '1998-05-15',
            'nationality' => 'Nigeria',
            'home_address' => '75 Olonode Street',
            'occupation' => 'Software Engineer',
            'salary' => '500000',
            'password' => 'password',
        ];

        $response = $this->post('/api/v1/auth/register', $payload);

        $response->assertStatus(201)
            ->assertJson([
                'success' => true,
                'data' => [
                    'token' => true,
                    'user' => true
                ]
            ]);

        $this->assertDatabaseHas('users', [
            'first_name' => $payload['first_name'],
            'middle_name' => $payload['middle_name'],
            'last_name' => $payload['last_name'],
            'email' => $payload['email'],
            'phone' => $payload['phone'],
        ]);

        $userId = $response->json()['data']['user']['id'];

        $this->assertDatabaseHas('profiles', [
            'user_id' => $userId
        ]);
    }
}
