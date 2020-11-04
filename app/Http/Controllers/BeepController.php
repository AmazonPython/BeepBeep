<?php

namespace App\Http\Controllers;

use App\Beep;

class BeepController extends Controller
{
    //用户主页
    public function index()
    {
        return view('beeps.index', [
            'beeps' => auth()->user()->timeline()
        ]);
    }

    //发布推文
    public function store()
    {
        $attributes = request()->validate(['content' => 'required|max:255']);

        Beep::create([
            'user_id' => auth()->id(),
            'content' => $attributes['content']
        ]);

        return redirect()->route('home');
    }

    //删除推文
    public function destroy($beep)
    {
        Beep::find($beep)->delete();
        return redirect()->route('home');
    }
}
