<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;


use Faker\Factory;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $faker  = Factory::create('id_ID');
        // Supaya saat generate hasil selalu sama
        $faker->seed(123);
        $this->call(UserSeeder::class);
        $this->call(BookTitleSeeder::class);
        $this->call(BookSeeder::class);
    }
}
