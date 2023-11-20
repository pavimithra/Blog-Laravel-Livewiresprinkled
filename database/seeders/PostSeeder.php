<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Post;
use App\Models\Category;
use App\Models\Image;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        /* Post::factory()
            ->has(Category::factory()->count(3))
            ->has(Image::factory()->count(3))
            ->create(); */
        
        Post::factory(50)
            ->create()
            ->each(function($post) {
                $randomcategories = Category::all()->random( rand(0, 4) )->pluck('id');
                $post->categories()->attach($randomcategories);
        }); 

        // Get all the roles attaching up to 3 random roles to each user
        $categories = Category::all();

        // Populate the pivot table
        Post::all()->each(function ($post) use ($categories) { 
            $post->categories()->attach(
                $categories->random(rand(1, 3))->pluck('id')->toArray()
            ); 
        });

        Post::all()->each(function ($post)  { 
             $post->images()->createMany([
                ['name' => 'images/posts/I8HEgupwxUDczYgZQSEW5N9xTmGKm4kerBRULbyE.jpg'],
                ['name' => 'images/posts/fTiLLvoYHCuYeicupho3OpIvpTjpkd0wixQyTkjw.jpg'],
                ['name' => 'images/posts/gKI2gwMxYh5UYNgtti8H9UZPzvsC7UDdxXi9rzfs.jpg', 'is_featured' => 1],
                ['name' => 'images/posts/jOzhOcPI9QxBKFzBnsHUz5ivDE29D5uYXEKqrtVT.jpg'],
            ]); 
        });
    }
}
