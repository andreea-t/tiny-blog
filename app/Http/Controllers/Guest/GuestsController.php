<?php

namespace App\Http\Controllers\Guest;
use App\Http\Controllers\Controller;
use App\Post;
use Illuminate\Http\Request;

class GuestsController extends Controller
{
    public function index()
    {
        $posts = Post::all();
        return view('guest.index', compact('posts'));
    }

    public function show($id)
    {
        $post = Post::find($id);
        return view('guest.show', compact('post'));
    }
}
