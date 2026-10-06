<?php

namespace Database\Seeders;

use App\Models\Book;
use Illuminate\Database\Seeder;

class BookSeeder extends Seeder
{
    public function run(): void
    {
        Book::create([
            'category_id' => 1,
            'title' => 'Dasar-Dasar Pemrograman',
            'author' => 'Budi Santoso',
            'publisher' => 'Informatika',
            'year' => 2024,
            'stock' => 10,
        ]);

        Book::create([
            'category_id' => 1,
            'title' => 'Belajar Laravel',
            'author' => 'Andi Wijaya',
            'publisher' => 'Tech Media',
            'year' => 2025,
            'stock' => 8,
        ]);

        Book::create([
            'category_id' => 2,
            'title' => 'Senja di Ujung Kota',
            'author' => 'Raka Pratama',
            'publisher' => 'Gramedia',
            'year' => 2023,
            'stock' => 5,
        ]);

        Book::create([
            'category_id' => 2,
            'title' => 'Langit Setelah Hujan',
            'author' => 'Dina Maharani',
            'publisher' => 'Bentang',
            'year' => 2022,
            'stock' => 7,
        ]);

        Book::create([
            'category_id' => 3,
            'title' => 'Metode Belajar Efektif',
            'author' => 'Agus Setiawan',
            'publisher' => 'Edu Press',
            'year' => 2024,
            'stock' => 12,
        ]);
    }
}
