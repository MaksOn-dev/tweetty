<?php

namespace App\Http\Controllers;

use App\Tweet;
use App\User;
use Illuminate\Http\Request;

class TweetsController extends Controller
{
    public function index()
    {
        $tweets = current_user()->timeline();

        return view('tweets.index', [
            'tweets' => $tweets
        ]);
    }
    
    public function store()
    {
        $attributes = request()->validate([
            'body'  => 'required:max:255'
        ]);

        Tweet::create([
            'user_id'   => auth()->id(),
            'body'      => $attributes['body']
        ]);

        request()->session()->flash('success', 'Perfect');

        return back();
    }

    public function delete(Tweet $tweet)
    {
        if($tweet->user->id != current_user()->id){
            request()->session()->flash('error', 'You have no permissions');
            return redirect()->back();
        }

        Tweet::destroy($tweet->id);
        request()->session()->flash('success', 'Deleted');

        return redirect()->back();
    }
}
