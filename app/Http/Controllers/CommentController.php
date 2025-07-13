<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function store(Request $request, Post $post)
    {
        $request->validate([
            'name' => 'required_unless:user_id,null|string|max:255',
            'email' => 'required_unless:user_id,null|string|email|max:255',
            'content' => 'required|string',
            'parent_id' => 'nullable|exists:comments,id',
        ]);

        $comment = new Comment();
        $comment->post_id = $post->id;
        $comment->content = $request->content;
        $comment->parent_id = $request->parent_id; // Save parent_id

        if (Auth::check()) {
            $comment->user_id = Auth::id();
            $comment->name = Auth::user()->name;
            $comment->email = Auth::user()->email;
        } else {
            $comment->name = $request->name;
            $comment->email = $request->email;
        }

        $comment->save();

        return back()->with('success', 'Comment added successfully!');
    }
}