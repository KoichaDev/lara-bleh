<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller {
    public function index() {
        return view('auth.register');
    }

    public function store(Request $request) {

        // This will give us array from the method of key-value pair we need for signing in
        // dd($request->only('email', 'password'));

        // TODO: Validate request
        // validate() function comes from the Controller class
        $this->validate($request, [ // If fail, it will throw exception which will redirect the user back
            'name'      =>  'required|max:255',
            'username'  =>  'required|max:255',
            'email'     =>  'required|email|max:255',
            'password'  =>  'required|confirmed', // the confirmed will look after anything that the name=password_confirmed from the input element.
        ]);

        // TODO: Store user
        // This is to create a user into the database by using the Laravel eloquent
        User::create([
            'name'      =>  $request->name,
            'username'  =>  $request->username,
            'email'     =>  $request->email,
            // Hash:: is facade from laravel. They are used on front for underlying functionalities. The hash has underlying implementation
            // by accessing functionalities. It doesn't make your code less testable. It just makes writing the code writing this code really easy
            // than doing new Hash(), then $hash -> make($request -> password)
            'password'  =>  Hash::make($request->password),
        ]);

        // TODO: Sign user in
        // auth()->user(); // returns the user modal of the user is signing in
        auth()->attempt($request->only('email', 'password'));

        // TODO: redirect
        // Sign the user in here this route
        // * best practice to chain the -> route() because when we change our route /dashboard, it will still work on our webp.php for example
        return redirect()->route('dashboard');
    }
}
