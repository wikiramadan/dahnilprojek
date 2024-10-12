<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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

        \App\Models\User::factory()->create([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('admin'),
            'status' => 'admin',
            'email_verified_at' => now(),
         ]);

         \App\Models\User::factory()->create([
            'name' => 'hafiz',
            'email' => 'hafiz@gmail.com',
            'password' => bcrypt('hafiz11'),
            'status' => 'pengunjung',
            'email_verified_at' => now(),
         ]);

         \App\Models\User::factory()->create([
            'name' => 'apih',
            'email' => 'apih@gmail.com',
            'password' => bcrypt('apih11'),
            'status' => 'pengunjung',
            'email_verified_at' => now(),
         ]);

         \App\Models\User::factory()->create([
            'name' => 'afifi',
            'email' => 'afifi@gmail.com',
            'password' => bcrypt('afifi'),
            'status' => 'pengunjung',
            'email_verified_at' => now(),
         ]);
    }
}
