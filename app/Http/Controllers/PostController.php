<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller {

    public function __construct() {
        $this -> middleware(['auth']);
    }

    public function index() {
        // Get all post from the database in order and it's Laravel collection.
        // ! Not so good if you have millions post in Database
        // $posts = Post::get();

        // Pagination for our post
        // arg. takes how many posts inside the page
        // * Post::with(['user', 'likes']) is used something called "eager loader". We can bundle those query together
        // * so we don't create seperated query for a user and likes, so a user that has a post and a likes for example that is bundled together for a single query
        // * If we don't have this solution, then we would  be overloaded to many queries and makes website slow
        $posts = Post::with(['user', 'likes'])->paginate(20);

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
