@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-3 p-5">
            <img src="/svg/freeCodeCampLogo.svg" class="rounded-circle"></img>
        </div>
        <div class="col-9 pt-5">
            <div class="d-flex justify-content-between align-items-baseline">
                <h1>{{$user->username}}</h1>
                <a href="/post/create">Add New Post</a>
            </div>
            <div class="d-flex">
                <div><strong>{{ $user->posts->count() }}</strong> post</div>
                <div class="ps-3"><strong>23k</strong> followers</div>
                <div class="ps-3"><strong>212</strong> following</div>
            </div>
            <div class="pt-4 font-weight-bold"><strong>{{ $user->profile->title }}</strong></div>
            <div>{{ $user->profile->description }}</div>
            <div><a href="www.freecodecamp.org" class="text-decoration-none link-secondary">{{ $user->profile->url }}</a></div>
        </div>
    </div>
    <div class="row pt-4">
        @foreach ($user->posts as $post)
            <div class="col-4 pb-4">
                <a href="/post/{{ $post->id }}">
                    <img src="/storage/{{ $post->image }}" class="w-100 h-200">
                </a>
            </div>
        @endforeach
    </div>
</div>
@endsection
