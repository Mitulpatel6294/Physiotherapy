<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // create one fixed admin user
        User::create([
            'name' => 'Admin', // name column
            'email' => 'admin@test.com', // unique email
            'password' => Hash::make('123456'), // hashed password (never plain)
        ]);

        // create 5 random normal users using factory
        User::factory(3)->create();
    }
}
