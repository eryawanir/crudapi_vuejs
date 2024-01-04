<?php

namespace Database\Seeders;

use App\Models\BookTitle;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BookTitleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        BookTitle::factory()->count(164)->create();
    }
}
