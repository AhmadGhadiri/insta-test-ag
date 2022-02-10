<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;

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

        //Using the Intervention/image library to fit the 
        // image in a square
        $image = Image::make(public_path("storage/{$imagePath}"))->fit(1200, 1200);
        $image->save();

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

    // Since we are passing the argument as name post
    // Laravel automatically find the Model with that id
    public function show(\App\Models\Post $post)
    {
        //Shorter version of passing post with 
        // compact function
        return view('posts.show', [
            'post' => $post
        ]);
    }
}
