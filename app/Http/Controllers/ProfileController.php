<?php

namespace App\Http\Controllers;

use App\Models\post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function index()
    {
        $user = Auth::user(); // Retrieve the authenticated user
//        $userPosts = Post::where('user_id', $user->id)
//            ->orderBy('updated_at', 'DESC')
//            ->get(); // Retrieve the user's posts

//        return view('profile.index')
//            ->with('user', $user)
//            ->with('posts', Post::where('user_id', $user->id)
//                ->orderBy('updated_at', 'DESC')
//                ->get());

        return view('profile.index')
            ->with('user', $user)
            ->with('userPosts', Post::where('user_id', $user->id)
                ->orderBy('updated_at', 'DESC')
                ->get());


    }
}
