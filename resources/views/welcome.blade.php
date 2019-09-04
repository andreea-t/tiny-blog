@extends('layouts.guest_layout')

@section('content')
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
            width: 320px;
            /* height: 420px; */
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
    </style>

    <input name="searchbox" type="text" placeholder="Search for posts..." />

    <div class="blog-posts">

        <div class="item">
            <img src="{{ asset('/images/test.jpg') }}">
            <div class="content">
                <p>31-08-2019</p>
                <h4>Post title</h4>
                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore
            </div>
            <div><a href="#">Read more</a></div>
        </div>

    </div>
@endsection