<?php

namespace App\Http\Controllers\Guest;
use App\Http\Controllers\Controller;
use App\Post;
use App\User;
use App\Invitation;
use App\Mail\InviteCreated;
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

    public function search(Request $request)
    {
        $posts = Post::where('visible', 'LIKE', 'true')
                    ->where(function ($query) use ($request) {
                            $query->where('title', 'LIKE', '%'.$request->search."%")
                                    ->orWhere('content', 'LIKE', '%'.$request->search."%");
                    })
                    ->get();

        return view('guest.index', compact('posts'));
    }
    public function accept($token){

        if (!$invite = Invitation::where('token', $token)->first()) {
            abort(404);
        }

        // User::create(['email' => $invite->email]);

        // $invite->delete();
        $email = $invite->email;
        if($email->empty())
        {
            return abort(404);
        }
        else{
            return view('auth.register', compact('email'));
        }
    }
}
