<?php

namespace Database\Seeders;

use App\Models\Book;
use App\Models\BookTitle;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // $jumlahJudulBuku = BookTitle::count();
        // // loop sampai seluruh judul
        for ($i = 0; $i < 34; $i++) {
            $jumlahBuku = rand(1, 5);
            for ($s = 0; $s < $jumlahBuku; $s++) {
                $book = Book::create();
                $book->book_title_id = $i + 1;
                $book_code = str_pad($book->book_title_id, 4, '0', STR_PAD_LEFT)
                    . '-' . str_pad($book->id, 4, '0', STR_PAD_LEFT);
                $book->code = $book_code;
                $book->status = 'tersedia';
                $book->save();
            }
        }
    }
}
