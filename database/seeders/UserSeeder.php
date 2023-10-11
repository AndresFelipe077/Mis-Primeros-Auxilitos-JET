<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name'              => 'Admin',
            'email'             => 'admin@auxilitos.com',
            'password'          => bcrypt('12345678'),
            'email_verified_at' => now()
        ])->assignRole('Admin');

        User::factory(1)->create();

    }
}
