<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = [
            [
                'name' => 'User 1',
                'email' => 'user1@gmail.com',
                'password' => bcrypt('password'),
            ],
            [
                'name' => 'User 2',
                'email' => 'user2@gmail.com',
                'password' => bcrypt('password'),
            ],
            [
                'name' => 'User 3',
                'email' => 'user3@gmail.com',
                'password' => bcrypt('password'),
            ],
        ];

        User::insert($user);
    }
}
