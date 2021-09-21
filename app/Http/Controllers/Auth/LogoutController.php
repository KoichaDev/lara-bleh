<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LogoutController extends Controller
{
    // store state for logout
    public function store() {
        auth() -> logout();

        return redirect() -> route('home');
    }
}
