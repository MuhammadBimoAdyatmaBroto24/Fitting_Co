<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Post;
use App\Models\User;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::first(); // Get the first user, or create one if none exists
        if (!$user) {
            $user = User::factory()->create();
        }

        Post::firstOrCreate(
            ['slug' => 'first-blog-post'],
            [
                'title' => 'First Blog Post',
                'slug' => 'first-blog-post',
                'content' => 'This is the content of the first blog post. It is a great place to share your thoughts and ideas.',
                'image' => 'img/blog/blog-1.jpg',
                'author_id' => $user->id,
                'published_at' => now(),
            ]
        );

        Post::firstOrCreate(
            ['slug' => 'second-blog-post'],
            [
                'title' => 'Second Blog Post',
                'slug' => 'second-blog-post',
                'content' => 'This is the content of the second blog post. More exciting content to come!',
                'image' => 'img/blog/blog-2.jpg',
                'author_id' => $user->id,
                'published_at' => now(),
            ]
        );

        Post::factory()->count(5)->create();
    }
}