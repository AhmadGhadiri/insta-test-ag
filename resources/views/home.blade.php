@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-3 p-5">
            <img src="/svg/freeCodeCampLogo.svg" class="rounded-circle"></img>
        </div>
        <div class="col-9 pt-5">
            <div><h1>freecodecamp</h1></div>
            <div class="d-flex">
                <div><strong>153</strong> post</div>
                <div class="ps-3"><strong>23k</strong> followers</div>
                <div class="ps-3"><strong>212</strong> following</div>
            </div>
            <div class="pt-4 font-weight-bold"><strong>freeCodeCamp.org</strong></div>
            <div>We're a community of millions of people learning to code together. We're an open source, donor-supported, 501(c)(3) nonprofit.</div>
            <div><a href="www.freecodecamp.org" class="text-decoration-none link-secondary">www.freecodecamp.org</a></div>
        </div>
    </div>
    <div class="row pt-4">
        <div class="col-4">
            <img src="https://www.freecodecamp.org/news/content/images/size/w2000/2021/07/maxresdefault--16-.jpeg" class="w-100 h-200">
        </div>
        <div class="col-4">
            <img src="https://www.freecodecamp.org/news/content/images/size/w2000/2021/07/maxresdefault--16-.jpeg" class="w-100 h-100">
        </div>
        <div class="col-4">
            <img src="https://www.freecodecamp.org/news/content/images/size/w2000/2021/07/maxresdefault--16-.jpeg" class="w-100 h-100">
        </div>
    </div>
</div>
@endsection
