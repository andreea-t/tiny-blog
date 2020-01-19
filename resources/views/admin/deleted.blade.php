@extends('layouts.app')
@section('content')
<div class="container">
    <h5>Deleted posts</h5>
    <p>You can restore deleted posts by clicking on the <strong>Restore post</strong> button.</p>
    <p>Return to the <a href="{{route('posts.index')}}">posts index</a>.</p>
    <hr>
    <div class="posts">
        @forelse($posts as $post)
        <div class="row my-3 d-flex align-items-center justify-content-between" style="margin-left: 0; margin-right: 0; padding: 0; min-height: 70px; border-radius: 15px; background: #fff; box-shadow: 0px 1px 5px 1px rgba(7,7,7,0.1)">
                <p class="col-lg-auto ml-3 my-2" style="margin: 0">ID: {{$post->id}}</p>
                <p class="col-md-5 mx-3 my-2" style="margin: 0">Title: {{$post->title}}</p>
                <div class="col-md-3 mx-3 my-2" style="margin: 0">Deleted: {{$post->deleted_at->diffForHumans()}}</div>
            <div class="col-lg-auto my-3 mx-3">
                <a href="/posts/deleted/{{$post->id}}/restore" onclick="event.preventDefault();document.getElementById('restore-form{{$post->id}}').submit();" class="btn btn-primary col-md-auto">Restore post</a>
                <form id="restore-form{{$post->id}}" action="/posts/deleted/{{$post->id}}/restore" method="post" style="display: none;">
                    @csrf
                </form>
            </div>
        </div>
        @empty
        <p>You haven't deleted any posts yet.</p>
        @endforelse
    </div>
    </div>
</div>
@endsection
