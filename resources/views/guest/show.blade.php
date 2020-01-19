@extends('layouts.guest_layout')

@section('content')

    <div class="container">

        <h3 class="text-center">{{$post->title}}</h3>

        <div class="w-100 d-flex justify-content-center my-5">
            
            <a href="/storage/{{$post->cover}}"><img style="max-width: 350px; height: auto" src="/storage/{{$post->cover}}"/></a>

            <div class="mx-5">
                <p><strong>Author:</strong> {{$post->user->name}}</p>
                <p><strong>Created:</strong> {{$post->created_at->diffForHumans()}} ({{$post->created_at->format('Y-m-d')}})</p>
            </div>

        </div>

        <p style="line-height: 2; padding: 10px 0 50px 0">{{$post->content}}</p>

    </div>

@endsection