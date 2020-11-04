<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Beep extends Model
{
    use Likable;

    protected $guarded = [];

    public function user()
    {
        //一对多关系反向关联
        return $this->belongsTo(User::class);
    }
}
