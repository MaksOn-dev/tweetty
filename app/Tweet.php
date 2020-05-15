<?php

namespace App;

use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Model;

class Tweet extends Model
{
    use Likable;

    protected $guarded = [];
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getPublishTime()
    {
        $diffInSeconds = Carbon::parse($this->created_at)->floatDiffInSeconds(Carbon::now());
        if($diffInSeconds < 60){
            return floor($diffInSeconds) . ' sec ago';
        };

        $diffInMinutes = Carbon::parse($this->created_at)->floatDiffInMinutes(Carbon::now());
        if($diffInMinutes < 60){
            return floor($diffInMinutes) . ' min ago';
        };

        $diffInHours = Carbon::parse($this->created_at)->floatDiffInHours(Carbon::now());
        if($diffInHours < 60){
            return floor($diffInHours) . ($diffInHours >= 2 ? ' hours ago' : ' hour ago');
        };

        $diffInDays = Carbon::parse($this->created_at)->floatDiffInDays(Carbon::now());
        if($diffInDays < 30){
            return floor($diffInDays) . ($diffInDays >= 2 ? ' days ago' : ' day ago');
        };

        $diffInMonths = Carbon::parse($this->created_at)->floatDiffInMonths(Carbon::now());
        if($diffInMonths < 12){
            return floor($diffInMonths) . ($diffInMonths >= 2 ? ' months ago' : ' month ago');
        };
    }    
}
