@extends('layouts.app')
@section('content')
<div class="container">
    <a href="{{ route('posts.create') }}" class="btn btn-success">Create post</a>
    <a href="{{ route('posts.deleted') }}" class="btn btn-primary">Deleted posts</a>
    <hr>
    <div class="posts">
        @forelse($posts as $post)
        <div class="row my-3 d-flex align-items-center justify-content-between" style="margin-left: 0; margin-right: 0; padding: 0; min-height: 70px; border-radius: 15px; background: #fff; box-shadow: 0px 1px 5px 1px rgba(7,7,7,0.1)">
                <h5 class="col-lg-1 ml-3 my-3 text-center" style="margin: 0; padding: 0;"><strong>{{$post->id}}.</strong></h5>
                <img class="col-lg-1" style="min-height: 80px; max-height: 380px; object-fit: cover; padding:0;" src="/storage/{{$post->cover}}"/>
                <h5 class="col-md-7 mx-3 my-2" style="margin: 0">{{$post->title}}</h5>
            <div class="col-md-auto my-3">
                <a href="/posts/{{$post->id}}" class="btn btn-info col-md-auto"><img src="{{asset('/images/eye.svg')}}" height="20px" width="20px"></a>
                <a href="{{route('posts.destroy', $post->id)}}" onclick="event.preventDefault();document.getElementById('delete-form{{$post->id}}').submit();" class="btn btn-danger col-md-auto"><img src="{{asset('/images/trash.svg')}}" height="18px" width="18px"></a>
                <form id="delete-form{{$post->id}}" action="{{route('posts.destroy', $post->id)}}" method="post" style="display: none;">
                    @method('DELETE')
                    @csrf
                </form>
            </div>
        </div>
        @empty
        <p>You haven't created any posts yet. To create a post, click on <strong>Create post</strong> button.
        @endforelse
    </div>
    </div>
</div>
@endsection
