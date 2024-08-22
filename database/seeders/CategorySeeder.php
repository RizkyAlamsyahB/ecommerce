<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    public function run()
    {
        for ($i = 1; $i <= 20000; $i++) {
            Category::create([
                'name' => 'Human ' . $i,
            ]);
        }
    }
}
