<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable implements MustVerifyEmail
{
    use Notifiable, Followable, \Illuminate\Auth\MustVerifyEmail;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    //头像属性，获取头像
    public function getAvatarAttribute($value)
    {
        if ($value == null){
            return asset('/images/avatar.png');
        }else{
            return asset('storage/'.$value);
            //return asset($value);//无法创建storage链接时返回此值
        }
    }

    //重设密码使用bcrypt()算法加密
    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = bcrypt($value);
    }

    //时间线功能，倒序显示自己和已关注用户的推文
    public function timeline()
    {
        $friends = $this->follows()->pluck('id');

        return Beep::whereIn('user_id', $friends)
            ->orWhere('user_id', $this->id)
            ->withLikes()
            ->orderByDesc('id')
            ->paginate(10);
    }

    //设置一对多关系，多条推文从属于用户
    public function beeps()
    {
        return $this->hasMany(Beep::class)->latest();
    }

    //模型搜索时使用自定义键名，与路由auth()->user()->name等效。Laravel7之后可直接在路由添加
    public function getRouteKeyName()
    {
        return 'name';
    }

    public function likes()
    {
        return $this->hasMany(Like::class);
    }

    public function path($append = '')
    {
        $path = route('profile', $this->name);

        return $append ? "{$path}/{$append}" : $path;
    }
}
