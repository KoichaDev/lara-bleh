<?php

namespace App\Policies;

use App\Models\Post;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

// This is the to control post policy of what the person can do what
class PostPolicy
{
    use HandlesAuthorization;

    // this will be used as "can user delete the post?"
    public function delete(User $user, Post $post) {
        // Check if the user id match with the post of the user id 
        return $user -> id === $post -> user_id;
    }
}
