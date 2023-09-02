<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function create($post_id)
    {
        $post = Post::find($post_id);
        return view('comments.create', compact('post'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'content' => 'required|min:1',
        ]);

        $post = Post::find($request->input('post_id'));

        $comment = new Comment();
        $comment->content = $request->input('content');

        if (auth()->check()) {
            // Attach the logged-in user to the comment
            $comment->user_id = auth()->user()->id;
        }

        $post->comments()->save($comment);

        return redirect('/blog/' . $post->slug)->with('message', 'Comment added successfully!');
    }



}

