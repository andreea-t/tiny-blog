@extends('layouts.app')

@section('content')
    <div class="container">
        <h3 class="text-center">{{$post->title}}</h3>
        <div class="w-100 d-flex justify-content-center my-5">
            <a href="/storage/{{$post->cover}}"><img style="max-width: 350px; height: auto" src="/storage/{{$post->cover}}"/></a>
            <div class="mx-5">
                <p><strong>Author:</strong> {{$post->user->name}}</p>
                <p><strong>Created:</strong> {{$post->created_at->diffForHumans()}} ({{$post->created_at->format('Y-m-d')}})</p>
                <a href="/admin/posts/{{$post->id}}/edit" class="btn btn-success">Edit post</a>
                <a href="{{route('posts.destroy', $post->id)}}" onclick="event.preventDefault();document.getElementById('delete-form').submit();" class="btn btn-danger">Delete post</a>
                <form id="delete-form" action="{{route('posts.destroy', $post->id)}}" method="post" style="display: none;">
                    @method('DELETE')
                    @csrf
                </form>
            </div>
        </div>
        <p style="line-height: 2; padding: 10px 10% 50px 10%">{{$post->content}}</p>
    </div>
@endsection