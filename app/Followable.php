<?php

namespace App;

trait Followable
{
    //关注用户
    public function follow(User $user)
    {
        return $this->follows()->save($user);
    }

    //取关用户
    public function unfollow(User $user)
    {
        return $this->follows()->detach($user);
    }

    //切换开关
    public function toggleFollow(User $user)
    {
        $this->follows()->toggle($user);
    }

    //检测关注状态
    public function following(User $user)
    {
        return $this->follows()
            ->where('following_user_id', $user->id)
            ->exists();
    }

    //多对多关系反向关联，显示已关注用户
    public function follows()
    {
        return $this->belongsToMany(
            User::class,
            'follows',
            'user_id',
            'following_user_id'
        );
    }
}
