<?php

namespace App;

trait Followable
{
    public function follow(User $user)
    {
        if($this->following($user)){
            return ;
        }
        return $this->follows()->save($user);
    }

    public function unfollow(User $user)
    {
        if($this->following($user)){
            $this->follows()->where('following_user_id', $user->id)->detach();
        }
    }

    public function follows()
    {
        return $this->belongsToMany(User::class, 'follows','user_id', 'following_user_id');
    }

    public function following(User $user)
    {
        // this get all users from db and then check if collection has user with that id
        // return $this->follows->has($user->id);

        // this get a user from db with needed user id and check if it exist
        return $this->follows()->where('following_user_id', $user->id)->exists();
    }
}