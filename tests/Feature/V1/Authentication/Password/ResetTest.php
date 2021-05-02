<?php

namespace Tests\Feature\V1\Authentication;

use App\Models\User;
use DB;
use Hash;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Password;
use Str;
use Tests\TestCase;

class ResetTest extends TestCase
{
    // use RefreshDatabase;

    public const ORIGINAL_PASSWORD = 'original_password';
    public const NEW_PASSWORD = 'new_password';

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testReset()
    {
        $token = Str::random(60);
        $user = User::factory()->create([
            'password' => Hash::make(self::ORIGINAL_PASSWORD)
        ]);
        $newPassword = self::NEW_PASSWORD;

        DB::table('password_resets')->insert([
            'token' => $token,
            'email' => $user->email
        ]);

        $this->assertDatabaseHas('password_resets', [
            'token' => $token,
            'email' => $user->email
        ]);

        $response = $this->post('/api/v1/auth/password/reset', [
            'token' => $token,
            'email' => $user->email,
            'password' => $newPassword,
            'password_confirmation' => $newPassword,
        ]);

        $user = $user->refresh();

        $this->assertFalse(Hash::check($user->password, self::ORIGINAL_PASSWORD));

        $this->assertTrue(Hash::check($user->password, $newPassword));

        $response->assertStatus(200)
            ->assertJson([
                'success' => true,
                'message' => __(Password::PASSWORD_RESET)
            ]);
    }
}
