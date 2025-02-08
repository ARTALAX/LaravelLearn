<?php

namespace Database\Seeders;

use App\Models\Publisher;
use Illuminate\Database\Seeder;

class PublisherSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        Publisher::factory()->count(30)->create(); // Генерируем 30 издательств
    }
}
