@extends('layouts.app')

@section('content')

<div class="container">

    <form action="/admin/user/create" enctype="multipart/form-data" method="POST">
        @csrf
        
        <div class="row">

            <div class="col-8 offset-2">

                <h1>Invite an user to your blog</h1>

                <div class="row mt-5">

                    <label for="email" class="col-md-12 col-form-label">Email:</label>
                    <input id="title" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" autocomplete="email" autofocus>
                    
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror

                </div>


                {{-- <div class="row mt-5">

                    <label for="visible" class="col-md-12 col-form-label">Is post visible?</label>
                    <input id="visible" type="radio" class="" name="visible" value="true" checked>Yes
                    <input id="visible" type="radio" class="" name="visible" value="false">No

                </div>


                <div class="row mt-3">

                    <label for="content" class="col-md-12 col-form-label">Content:</label>
                    <textarea rows="10" id="content" type="text" class="form-control @error('content') is-invalid @enderror" name="content" value="{{ old('content') }}" autocomplete="content" autofocus></textarea>
                    
                    @error('content')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror

                </div>


                <div class="row mt-3">

                    <label for="cover" class="col-md-4 col-form-label">Add a cover image for your post:</label>
                    <input type="file" class="form-control-file" id="cover" name="cover">
                    
                    @error('cover')
                        <strong class="text-danger">{{ $message }}</strong>
                    @enderror

                </div> --}}

                <div class="row mt-3 pt-4">
                    <button class="btn btn-primary col-md-2" style="margin:auto">Send invite</button>
                </div>

            </div>

        </div>

    </form>

</div>

@endsection