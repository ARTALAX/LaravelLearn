<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // profile::factory(10)->create();

        $this->call([
            BookSeeder::class,

        ]);
        $this->call([
            RoleSeeder::class,

        ]);
    }
}
