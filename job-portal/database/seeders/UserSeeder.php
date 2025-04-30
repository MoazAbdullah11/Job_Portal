<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run()
{
    User::firstOrCreate(
        ['email' => 'recruiter@example.com'],
        [
            'name' => 'Alice Recruiter',
            'password' => Hash::make('password'),
            'role' => 'recruiter',
        ]
    );

    User::firstOrCreate(
        ['email' => 'seeker@example.com'],
        [
            'name' => 'Bob Seeker',
            'password' => Hash::make('password'),
            'role' => 'seeker',
        ]
    );
}
}
