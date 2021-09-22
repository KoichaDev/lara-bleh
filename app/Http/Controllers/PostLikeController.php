<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostLikeController extends Controller
{
    function store(Post $post, Request $request) {

        $isUserLikedPost = $post -> likedByUser($request -> user());

        if($isUserLikedPost) {
            // Status code for conflict http code
            return response(null, 409);
        }



        $post -> likes() -> create([
            'user_id' => $request -> user() -> id,
        ]);

        return back();
    }

    // destroy name is just a Laravel convention
    public function destroy(Post $post, Request $request) {
        // ! We need to be careful to authorize who is going to delete the post
        // * $request -> user() -> likes() this will return of the user that has liked the post
        // * -> where('post_id', $post -> id) -> delete(); This will return the one post we are trying to get from $post -> id and then delete it
        $request -> user() -> likes() -> where('post_id', $post -> id) -> delete();

        return back();
    }
}
