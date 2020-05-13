<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class FollowsController extends Controller
{
    public function store(User $user)
    {
        current_user()->follow($user);

        return back();
    }

    public function delete(User $user)
    {
        current_user()->unfollow($user);

        return back();
    }
}
