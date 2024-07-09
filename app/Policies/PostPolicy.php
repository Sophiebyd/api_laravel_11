<?php

namespace App\Policies;

use App\Models\Post;
use App\Models\User;

class PostPolicy
{
    // vérification si l'user est admin
    public function before(user $user){
        if ($user->role->role_id == 2){
            return true;
        } else {
            return false;
        }

        // version opti
        // return $user->role_id == 2;
    }

    /**
     * Determine whether the user can update the model.
     */
    // seul l'user ou l'admin peut modifier
    public function update(User $user, Post $post): bool
    {
        return $user-> id == $post->user_id;
        // return $user->id == $post->user_id || $user->role->role == 2; 
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Post $post): bool
    {
        return $user->id == $post->user_id;
        // return $user->id == $post->user_id || $user->role->role == "admin";
    }
}
