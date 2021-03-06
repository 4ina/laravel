<?php


namespace App\Traits;

use App\Like;
use App\User;
use Illuminate\Database\Eloquent\Builder;

trait Likable
{
    public function scopeWithLikes(Builder $query)
    {
        $query->leftJoinSub(
            'select tweet_id, sum(liked) likes, sum(!liked) dislikes from likes group by tweet_id',
            'likes',
            'likes.tweet_id',
            'tweets.id'
        );
    }

    public function like($user = null, $liked = true)
    {
        // dd($this->likes()->first(), $this->likes()->first()['liked'] == $liked, $liked, 0 == false);
        if ($this->likes()->first() and $this->likes()->first()['liked'] == $liked) {
            $this->likes()->first()->delete();
        } else {
            $this->likes()->updateOrCreate([
                'user_id' => $user ? $user->id : auth()->id(),
            ], [
                'liked' => $liked,
            ]);
        }
    }

    public function dislike($user = null)
    {
        $this->like($user, false);
    }

    public function isLikedBy(User $user)
    {
        return (bool) $user->likes()->where('tweet_id', $this->id)->where('liked', true)->count();
    }

    public function isDisLikedBy(User $user)
    {
        return (bool) $user->likes()->where('tweet_id', $this->id)->where('liked', false)->count();
    }

    public function likes()
    {
        return $this->hasMany(Like::class);
    }
}
