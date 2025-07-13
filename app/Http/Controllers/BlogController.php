<?php

namespace App\Http\Controllers;

use App\Models\Post; // Import the Post model
use Illuminate\Http\Request;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::whereNotNull('published_at')
                     ->latest('published_at')
                     ->paginate(10); // Paginate results

        return view('blog.index', compact('posts'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        $post->load(['author', 'comments' => function ($query) {
            $query->whereNull('parent_id')->with('user', 'replies.user');
        }]);

        $previousPost = Post::where('published_at', '<=', $post->published_at)
                            ->where('id', '<', $post->id) // Fallback for same published_at
                            ->whereNotNull('published_at')
                            ->latest('published_at')
                            ->first();

        $nextPost = Post::where('published_at', '>=', $post->published_at)
                        ->where('id', '>', $post->id) // Fallback for same published_at
                        ->whereNotNull('published_at')
                        ->oldest('published_at')
                        ->first();

        return view('blog.show', compact('post', 'previousPost', 'nextPost'));
    }
}