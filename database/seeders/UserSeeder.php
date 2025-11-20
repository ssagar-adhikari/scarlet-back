<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
               User::Create(

            ['email' => 'admin@admin.com',

                'name' => 'Admin User',
                'password' => bcrypt('password'), // will be hashed by model mutator
            ]

        );

    }
}
