<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        Category::create([
            'name' => 'Teknologi',
            'description' => 'Buku tentang teknologi dan komputer.',
        ]);

        Category::create([
            'name' => 'Novel',
            'description' => 'Kumpulan buku novel dan cerita.',
        ]);

        Category::create([
            'name' => 'Pendidikan',
            'description' => 'Buku untuk pembelajaran dan pendidikan.',
        ]);
    }
}
