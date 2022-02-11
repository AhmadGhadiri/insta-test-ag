@extends('layouts.app')

@section('content')
<div class="container">
    <form action="/profile/{{ $user->id }}" enctype="multipart/form-data" method="POST">
        @csrf
        @method('PATCH')

        <div class="row">
            <div class="col-8 offset-2">
                <div>
                    <h1>Edit Profile</h1>
                </div>
                <div class="row mb-3">
                    <label for="title" class="col-md-4 col-form-label">Title</label>
                    <div class="w-100"></div>
                    <div class="col-sm-4">
                        <input id="title" type="text" class="col-sm-4 form-control @error('title') is-invalid @enderror" 
                                name="title" value="{{ old('title') ?? $user->profile->title }}" 
                                required autocomplete="title" autofocus>
                    </div>
                    @error('title')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="row mb-3">
                    <label for="description" class="col-md-4 col-form-label">Description</label>
                    <div class="w-100"></div>
                    <div class="col-sm-4">
                        <input id="description" type="text" class="col-sm-4 form-control @error('description') is-invalid @enderror"
                                name="description" value="{{ old('description') ?? $user->profile->description }}" 
                                required autocomplete="description" autofocus>
                    </div>
                    @error('description')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="row mb-3">
                    <label for="url" class="col-md-4 col-form-label">url</label>
                    <div class="w-100"></div>
                    <div class="col-sm-4">
                        <input id="url" type="text" class="col-sm-4 form-control @error('url') is-invalid @enderror"
                                name="url" value="{{ old('url') ?? $user->profile->url }}"
                                required autocomplete="url" autofocus>
                    </div>
                    @error('url')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="row mb-3">
                    <label for="image" class="col-md-4 col-form-lable">Profile Image</label>
                    <input type="file" class="form-control-file @error('image') is-invalid @enderror" id="image" name="image">
        
                    @error('image'))
                        <strong>{{ $message }}</strong>                    
                    @enderror
                </div>
                <div class="row">
                    <div class="col-4">
                        <button class="btn btn-primary">Save Profile</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection
