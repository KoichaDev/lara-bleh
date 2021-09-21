<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginController extends Controller {

    public function __construct()
    {
        // Prevent to go to go e.g. example.com/login if you are already logged in as a user
        $this -> middleware(['guest']);
    }

    // responsible for showing the form
    public function index(Request $request) {

        return view('auth.login');
    }

    // Responsible for signing the user in to the dashboard
    public function store(Request $request) {

        $this->validate($request, [ // If fail, it will throw exception which will redirect the user back
            'email'     =>  'required|email',
            'password'  =>  'required', // the confirmed will look after anything that the name=password_confirmed from the input element.
        ]);
        // This will attempt the authenthication
        // the 2nd param: is a remember_token Laravel will use to remember the user has been logged. The remember_token will be added on the database automatically
        if (!auth()->attempt($request->only('email', 'password'), $request -> remember)) {
            // back() is a shortcut function as redirect()
            return back() -> with('status', 'Invalid login details');
        }

        return redirect()->route('dashboard');
    }
}
