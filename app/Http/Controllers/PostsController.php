<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostsController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    //
    public function create()
    {
        return view('posts.create');
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $data = $request->validate([
            'image' => ['required', 'image'],
            'caption' => 'required', 
        ]);

        // dd($request);
        // dd($data['image']);
        // Need to run this command to make this available
        // php artisan storage:link
        $imagePath = $request['image']->store('uploads', 'public');

        // Since the data is exactly the same as Post
        // We can just pass the data
        // \App\Models\Post::create($data);

        // The above don't work because post has user_id
        // so we need to use an authenticated user
        auth()->user()->posts()->create([
            'caption' => $data['caption'],
            'image' => $imagePath,
        ]);

        return redirect('/profile/'. auth()->user()->id);
    }
}
