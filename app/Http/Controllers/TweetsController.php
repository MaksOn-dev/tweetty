<?php

namespace App\Http\Controllers;

use App\Tweet;
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
    
    public function store(){
        $attributes = request()->validate([
            'body'  => 'required:max:255'
        ]);

        Tweet::create([
            'user_id'   => auth()->id(),
            'body'      => $attributes['body']
        ]);

        return back();
    }
}
