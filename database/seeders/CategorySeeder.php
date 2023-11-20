<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use \App\Models\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Category::factory()
                ->count(9)
                ->sequence(
                    ['name' => 'Juices'],
                    ['name' => 'Smoothies'],
                    ['name' => 'Smoothie Bowls'],
                    ['name' => 'Main Course'],
                    ['name' => 'Soups'],
                    ['name' => 'Salads'],
                    ['name' => 'Drinks'],
                    ['name' => 'Herbal Teas'],
                    ['name' => 'Deserts'],
                )
                ->create();
    }
}
