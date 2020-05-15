<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\User;

class ProfilesController extends Controller
{
    public function show(User $user)
    {
        return view('profiles.show', [
            'user'      => $user,
            'tweets'    => $user->tweets()
                ->withLikes()
                ->latest()
                ->paginate(3)
        ]);
    }

    public function edit(User $user)
    {     
        return view('profiles.edit', compact('user'));
    }

    public function update(User $user){
        $attributes = request()->validate([
            'name' => ['required', 'string', 'max:255'],
            'username' => ['required', 'string', 'max:255', 'alpha_dash', Rule::unique('users')->ignore($user)],
            'email' => ['required', 'string', 'email', 'max:255', Rule::unique('users')->ignore($user)],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        if(request('avatar')){
            $attributes['avatar'] = request('avatar')->store('avatars');
        }
        if(request('banner')){
            $attributes['banner'] = request('banner')->store('banners');
        }

        $user->update($attributes);

        return redirect($user->path());
    }
}
