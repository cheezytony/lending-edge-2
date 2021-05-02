<?php

namespace Tests\Feature\V1\Authentication\Password;

use App\Models\User;
use Illuminate\Auth\Notifications\ResetPassword;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Notification;
use Tests\TestCase;

class RequestTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Tests a successful password request.
     *
     * @return void
     */
    public function testSuccessfulPasswordRequest()
    {
        $user = User::factory()->create();

        Notification::fake();

        $response = $this->postJson('/api/v1/auth/password/request', [
            'email' => $user->email
        ]);

        Notification::assertSentTo(
            [$user], ResetPassword::class
        );

        $response->assertStatus(200)
            ->assertJson([
                'success' => true
            ]);
    }
}
