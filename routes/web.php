<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\PostLikeController;
use App\Http\Controllers\UserPostController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\RegisterController;

Route::get('/', function() {
    return view('home');
})->name('home');


// * Alternative 1 to use middleware to not let user go to dashboard if it's not logged in to their user account

// Route::get('/dashboard', [DashboardController::class, 'index'])
//     -> name('dashboard')
//     -> middleware('auth'); // * This will redirect to the login page if user are not logged in to their account

// * Alternative 2 is to use without middleware like alternative 1, but instead we use it on our DashBoardController on our magic method constructor
Route::get('/dashboard', [DashboardController::class, 'index']) -> name('dashboard');

Route::get('/users/{user:username}/posts', [UserPostController::class, 'index']) -> name('users.posts');

// ! This is vurnerable for cross site forgery when using get-method. If JavaScript is used to hit this logout page, we will be signed out
// ! of our application. Ideally, we want to protect it with cross site request forgery
// Route::get('/logout', [LoginController::class, 'store'])->name('logout');

// ! This is safer way! Remember the post method needs to be added on the form HTML of the method="post
Route::post('/logout', [LogoutController::class, 'store'])->name('logout');


Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'store'])->name('login');

// We are using the -> name() to chain the router for our app.blade.php link url
Route::get('/register', [RegisterController::class, 'index'])->name('register');
// We don't need -> name() to chain here, because we are inhering on the code line above of -> name()
Route::post('/register', [RegisterController::class, 'store']);

Route::get('/posts', [PostController::class, 'index']) -> name('posts');
Route::get('/posts/{post}', [PostController::class, 'show']) -> name('posts.show');
Route::post('/posts', [PostController::class, 'store']);

Route::delete('/posts/{post}', [PostController::class, 'destroy']) -> name('posts.destroy');

// routes for adding like/unlike for the post
Route::post('/posts/{post}/likes', [PostLikeController::class, 'store']) -> name('posts.likes');
Route::delete('/posts/{post}/unlike', [PostLikeController::class, 'destroy']) -> name('posts.unlike');



// Route::get('/posts', function () {
//     return view('posts.index');
// });
