<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index() {
        // Get all post from the database in order and it's Laravel collection
        $posts = Post::get();

        return view('posts.index', [
            'posts' => $posts,
        ]);
    }

    // This will store the post. The $request will be used to extract the data
    public function store(Request $request ) {

        // Setting rules what we want to validate in our form post to store
        $this -> validate($request, [
            'body' => 'required'
        ]);

        // Laravel automatically autofill in the user_id for us
        // // We can use this methodic if we need to pass huge data at once
        // $request -> user() -> posts() -> create([
        //     'body' => $request-> body,
        // ]);

        // If we only need to pass a simple data, then we can do this instead that returns an array of body key-pair value
        $request -> user() -> posts() -> create($request -> only('body'));

        // This is redirect back to the original post
        return back();
    }
}
