<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Validation\Rule;

class ProfileController extends Controller
{
    public function show(User $user)
    {
        return view('profiles.show', [
            'user' => $user,
            'beeps' => $user
                ->beeps()
                ->withLikes()
                ->paginate(3),
        ]);
    }

    public function edit(User $user)
    {
        return view('profiles.edit', compact('user'));
    }

    //更新功能，用户名不可更改，可更改选项：昵称、头像、个人介绍、密码
    public function update(User $user)
    {
        $attributes = request()->validate([
            'name' => [
                'string',
                'required',
                'max:30',
                'alpha_dash',
                Rule::unique('users')->ignore($user),
            ],
            'Nickname' => ['string', 'required', 'max:30'],
            'bio' => ['string', 'max:255'],
            'avatar' => ['image'],
            'email' => [
                'string',
                'required',
                'email',
                'max:255',
                Rule::unique('users')->ignore($user),
            ],
            'password' => [
                'string',
                'required',
                'min:8',
                'max:255',
                'confirmed',
            ],
        ]);

        if (request('avatar')) {
            $attributes['avatar'] = request('avatar')->store('avatars');
        }

        $user->update($attributes);

        return redirect($user->path());
    }
}
