<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class ProfilesController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(User $user)
    {
        return view('profiles.index', [
            'user' => $user
        ]);
    }

    public function edit(User $user)
    {
        // Authorizing this with profile
        $this->authorize('update', $user->profile);

        return view('profiles.edit', [
            'user' => $user
        ]);
    }

    public function update(Request $request, User $user)
    {

        // Authorizing this with profile
        $this->authorize('update', $user->profile);
        // dd($request->all());
        $data = $request->validate([
            'title' => 'required',
            'description' => 'required',
            'url' => 'url',
            'image' => '',
        ]);

        // dd($request);
        // dd($data['image']);
        // Need to run this command to make this available
        // php artisan storage:link
        if ($request['image']) {
            $imagePath = $request['image']->store('profile', 'public');
        

            //Using the Intervention/image library to fit the 
            // image in a square
            $image = Image::make(public_path("storage/{$imagePath}"))->fit(200, 200);
            $image->save();
        }

        // Since the data is exactly the same as Post
        // We can just pass the data
        // \App\Models\Post::create($data);

        // The above don't work because post has user_id
        // so we need to use an authenticated user
        auth()->user()->profile->update([
            'title' => $data['title'],
            'description' => $data['description'],
            'url' => $data['url'],
            'image' => $imagePath,
        ]);

        return redirect('/profile/'. auth()->user()->id);
    }
}
