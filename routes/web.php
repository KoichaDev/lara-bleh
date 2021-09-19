<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;


// We are using the -> name() to chain the router for our app.blade.php link url
Route::get('/register', [RegisterController::class, 'index'])->name('register');
// We don't need -> name() to chain here, because we are inhering on the code line above of -> name()
Route::post('/register', [RegisterController::class, 'store']);

Route::get('/posts', function () {
    return view('posts.index');
});
