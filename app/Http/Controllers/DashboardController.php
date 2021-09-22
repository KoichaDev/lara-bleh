<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class DashboardController extends Controller {

    public function __construct()
    {
        // we can define our middleware here to run for the entire DashBoardController
        $this -> middleware(['auth']);
    }


    public function index() {
        // * Doing dd() will prove us the user is signed in and get the object data that is defined fom the user.php that is connected to the database
        // dd(auth()->user());

        // * This is to get the object of the post that exist from the user based on the users posts from the database which is the current user that is logged in
        // dd(auth() -> user() -> posts);

        // If you need to manipulate the date of created_at property. Google carbon documentation how to do it. Laravel is using that library
        // dd(Post::find(4)-> created_at) ;
        return view('dashboard');
    }
}
