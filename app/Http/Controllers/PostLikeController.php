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
}
