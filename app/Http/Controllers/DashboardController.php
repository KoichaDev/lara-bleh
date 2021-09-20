<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller {

    public function index() {
        // * Doing dd() will prove us the user is signed in
        // dd(auth()->user());
        return view('dashboard');
    }
}
