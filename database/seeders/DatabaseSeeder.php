<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        \App\Models\User::create([
            'name' => "Super Admin",
            'email' => "admin@admin.com",
            'email_verified_at' => now(),
            'password' => bcrypt("password"), // password
            'remember_token' => \Str::random(10)
        ]);
    }
}
