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
        // validate() function comes from the Controller class
        $this->validate($request, [ // If fail, it will throw exception which will redirect the user back
            'name'      =>  'required|max:255',
            'username'  =>  'required|max:255',
            'email'     =>  'required|email|max:255',
            'password'  =>  'required|confirmed', // the confirmed will look after anything that the name=password_confirmed from the input element.
        ]);

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
        // TODO: Validate request
        // TODO: Store user
        // TODO: Sign user in
        // TODO: redirect
    }
}
