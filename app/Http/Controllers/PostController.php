<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index() {
        return view('posts.index');
    }

    // This will store the post. The $request will be used to extract the data
    public function store(Request $request ) {
        dd('OK!');
    }
}
