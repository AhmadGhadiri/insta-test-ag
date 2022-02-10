@extends('layouts.app')

@section('content')
<div class="container">
    <form action="/post" enctype="multipart/form-data" method="POST">
        @csrf

        <div class="row">
            <div class="col-8 offset-2">
                <div>
                    <h1>Add New Post:</h1>
                </div>
                <div class="row mb-3">
                    <label for="caption" class="col-md-4 col-form-label">Post Caption</label>
                    <div class="w-100"></div>
                    <div class="col-sm-4">
                        <input id="caption" type="text" class="col-sm-4 form-control @error('caption') is-invalid @enderror" name="caption" value="{{ old('caption') }}" required autocomplete="caption" autofocus>
                    </div>
                    @error('caption')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="row mb-3">
                    <label for="image" class="col-md-4 col-form-lable">Post Image</label>
                    <input type="file" class="form-control-file @error('image') is-invalid @enderror" id="image" name="image">
        
                    @error('image'))
                        <strong>{{ $message }}</strong>                    
                    @enderror
                </div>
                <div class="row">
                    <div class="col-4">
                        <button class="btn btn-primary">Add New Post</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection
