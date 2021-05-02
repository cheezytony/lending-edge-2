<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Profile;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'first_name' => 'Antonio',
            'last_name' => 'Okoro',
            'middle_name' => null,
            'phone' => '09027286158',
            'email' => 'cheezytony1@gmail.com',
            'password' => bcrypt('avatar')
        ]);

        Profile::create([
            'user_id' => $user->id
        ]);

        User::factory(10)->create();
    }
}
