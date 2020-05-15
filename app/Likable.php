<?php

namespace App;

use Illuminate\Database\Eloquent\Builder;
use Symfony\Component\HttpFoundation\Session\Session;

trait Likable
{
    public function scopeWithLikes(Builder $query)
    {
        return $query->leftJoinSub(
            'select tweet_id, sum(liked) likes, sum(!liked) dislikes from likes group by tweet_id',
            'likes',
            'likes.tweet_id',
            'tweets.id'
        );
    }

    public function like($user = null, $liked = true)
    {
        $liked_user = $user ? $user : current_user();

        if($this->likes()->where('liked', $liked)->get()->contains('user_id', $liked_user->id)){
            $this->likes()->where('liked', $liked)->where('user_id', $liked_user->id)->delete();
            return ;
        }

        $this->likes()->updateOrCreate([
            'user_id'   => $liked_user->id,
        ], [
            'liked'     => $liked
        ]);
    }

    public function dislike($user = null)
    {
        $this->like($user, false);
    }

    public function isLikedBy(User $user)
    {
        // loop ?!
        // return $this->likes()->where('user_id', $user->id)->exists();
        return (bool) $user->likes->where('tweet_id', $this->id)->where('liked', true)->count();
    }

    public function isDislikedBy(User $user)
    {
        // loop ?!
        // return $this->likes()->where('user_id', $user->id)->exists();
        $tw = $user->likes;
        return (bool) $user->likes->where('tweet_id', $this->id)->where('liked', false)->count();
    }

    public function likes()
    {
        return $this->hasMany(Like::class);
    }
}