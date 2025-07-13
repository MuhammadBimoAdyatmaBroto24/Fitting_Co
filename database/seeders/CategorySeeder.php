<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [
            ['name' => 'T-Shirt', 'slug' => 't-shirt'],
            ['name' => 'Hoodie', 'slug' => 'hoodie'],
            ['name' => 'Jacket', 'slug' => 'jacket'],
            ['name' => 'Pants', 'slug' => 'pants'],
            ['name' => 'Shorts', 'slug' => 'shorts'],
            ['name' => 'Accessories', 'slug' => 'accessories'],
            ['name' => 'Shoes', 'slug' => 'shoes'],
            ['name' => 'Bags', 'slug' => 'bags'],
        ];

        foreach ($categories as $category) {
            Category::firstOrCreate(['slug' => $category['slug']], $category);
        }
    }
}