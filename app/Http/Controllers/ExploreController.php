<?php

namespace App\Http\Controllers;

use App\User;

class ExploreController extends Controller
{
    //invoke方法适合只处理一个动作的控制器
    public function __invoke()
    {
        return view('explore', [
            'users' => User::paginate(3),
        ]);
    }
}
