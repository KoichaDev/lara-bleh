<?php

namespace App\Http\Controllers;

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
        return view('dashboard');
    }
}
