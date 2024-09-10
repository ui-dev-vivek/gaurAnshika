<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Faker\Factory as Faker;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $faker = Faker::create();

        // Create Categories
        $categories = [];
        for ($i = 1; $i <= 5; $i++) {
            $categories[] = DB::table(config('filamentblog.tables.prefix') . 'categories')->insertGetId([
                'name' => $categoryName = $faker->word,
                'slug' => Str::slug($categoryName),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

        // Create Tags
        $tags = [];
        for ($i = 1; $i <= 10; $i++) {
            $tags[] = DB::table(config('filamentblog.tables.prefix') . 'tags')->insertGetId([
                'name' => $tagName = $faker->word,
                'slug' => Str::slug($tagName),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

        // Create Posts
        $posts = [];
        for ($i = 1; $i <= 20; $i++) {
            $posts[] = DB::table(config('filamentblog.tables.prefix') . 'posts')->insertGetId([
                'title' => $title = $faker->sentence,
                'slug' => Str::slug($title),
                'sub_title' => $faker->sentence,
                'body' => $faker->paragraph(5),
                'status' => $faker->randomElement(['published', 'scheduled', 'pending']),
                'published_at' => now(),
                'scheduled_for' => $faker->dateTimeBetween('+1 days', '+10 days'),
                'cover_photo_path' => $faker->imageUrl(),
                'photo_alt_text' => $faker->sentence,
                'user_id' => 1, // Assuming a user with ID 1 exists
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

        // Map Categories to Posts (many-to-many relationship)
        foreach ($posts as $post) {
            // Assign random categories to each post
            $assignedCategories = $faker->randomElements($categories, rand(1, 3));
            foreach ($assignedCategories as $categoryId) {
                DB::table(config('filamentblog.tables.prefix') . 'category_' . config('filamentblog.tables.prefix') . 'post')->insert([
                    'post_id' => $post,
                    'category_id' => $categoryId,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        }

        // Map Tags to Posts (many-to-many relationship)
        foreach ($posts as $post) {
            // Assign random tags to each post
            $assignedTags = $faker->randomElements($tags, rand(1, 5));
            foreach ($assignedTags as $tagId) {
                DB::table(config('filamentblog.tables.prefix') . 'post_' . config('filamentblog.tables.prefix') . 'tag')->insert([
                    'post_id' => $post,
                    'tag_id' => $tagId,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        }
    }
}
