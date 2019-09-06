<?php

namespace App\Http\Controllers;
use App\Post;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $posts = Post::all();
        return view('posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = request()->validate([
            'title' => 'required',
            'content' => 'required',
            'cover' => ['image', 'required'],
        ]);

        $image = request('cover')->store('/uploads/'.auth()->user()->name, 'public');
         
        $post = new Post;
        $post->create([
            'user_id' => auth()->user()->id,
            'title' => $data['title'],
            'content' => $data['content'],
            'cover' => $image,
        ]);

        return redirect(route('posts.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::find($id);
        return view('posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::find($id);
        $this->authorize('update', $post);
        return view('posts.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $post = Post::find($id);

        $data = request()->validate([
            'title' => 'required',
            'content' => 'required',
            'cover' => '',
        ]);

        if(request('cover')){
            $image = request('cover')->store('uploads', 'public');
            $imageArray = ['cover' => $image];
        }

        $post->update(array_merge(
            $data,
            $imageArray ?? []
        ));

        return redirect(route('posts.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);
        $post->delete();
        return redirect(route('posts.index'));
    }

    public function deleted()
    {
        $posts = Post::onlyTrashed()->get();
        return view('posts.deleted', compact('posts'));
    }

    public function restore($id) 
    {
        $post = Post::onlyTrashed()->find($id)->restore();
        $posts = Post::onlyTrashed()->get();
        return redirect('/posts/deleted');
    }
}
