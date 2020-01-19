@extends('layouts.guest_layout')

@section('content')

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://unpkg.com/imagesloaded@4/imagesloaded.pkgd.min.js"></script>
    <script src="https://unpkg.com/masonry-layout@4/dist/masonry.pkgd.min.js"></script>

    <style>
        input[name="searchbox"]{
            width: 100%;
            height: 50px;
            border-radius: 30px;
            border: none;
            outline: none;
            padding: 0px 50px 0px 50px;
            box-shadow: 1px 1px 4px 1px rgba(8,8,8,0.08);
            border: 1px solid #eee;
            margin: 50px 0 50px 0;
            transition: .5s;
        }
        input[name="searchbox"]:focus{
            border: 1px solid #4CAF50;
        }
        .blog-posts{
            margin: 50px 0 100px 0;
        }
        .item{
            width: calc(100% / 3 - 20px);
            margin: 10px;
            background: #fff;
            box-shadow: 0px 2px 4px 1px rgba(8,8,8,0.08);
        }
        .item>img{
            height: 55%;
            min-height: 150px;
            max-height: 350px;
            width: 100%;
            object-fit: cover;
            object-position: center center;
        }
        .item>div:nth-of-type(2){
            height: 50px;
            background: #111;
            width: 100%;
            display: flex;
            align-items: center;
            justify-content: flex-end;
            padding-right: 30px;
        }
        .item>div:nth-of-type(2)>a{
            color: #eee;
        }
        .content{
            padding: 20px;
        }
        .content>p{
            margin: 0px 0 8px 0;
        }
        @media screen and (max-width: 1024px){
            .item{
                width: calc(100% / 2 - 20px);
            }
        }
        @media screen and (max-width: 600px){
            .item{
                width: 100%;
                margin-left: 0;
                margin-right: 0;
            }
        }
    </style>

    {{-- <form action="/" method="GET">
        {{ csrf_token() }}
        <input name="searchbox" type="text" placeholder="Search for posts..." />
        <button class="btn btn-secondary d-none" type="submit">Search</button>
    </form> --}}

    <div class="blog-posts grid" data-masonry='{ "itemSelector": ".grid-item"}'">
        @forelse($posts as $post)
        <div class="item grid-item">
            <img src="/storage/{{$post->cover}}">
            <div class="content">
            <p>{{$post->created_at->diffForHumans()}}</p>
            <h4>{{$post->title}}</h4>
            {{$post->truncate($post->content)}}
            </div>
            <div><a href="/post-{{$post->id}}">Read more</a></div>
        </div>
        @empty
        <p>This blog doesn't have any posts yet.</p>
        @endforelse

    </div>
@endsection