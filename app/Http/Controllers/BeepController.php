<?php

namespace App\Http\Controllers;

use App\Beep;
use Illuminate\Http\Request;

class BeepController extends Controller
{
    //用户主页
    public function index()
    {
        return view('beeps.index', [
            'beeps' => auth()->user()->timeline()
        ]);
    }

    //发布推文 可以创建storage链接时
    public function store()
    {
        $attributes = request()->validate([
            'content' => 'required|max:255',
            'picture' => 'image|nullable'
        ]);

        if (request('picture') != null) {
            Beep::create([
                'user_id' => auth()->id(),
                'content' => $attributes['content'],
                'picture' => $attributes['picture'] = request('picture')->store('upload')
            ]);
        }else{
            Beep::create([
                'user_id' => auth()->id(),
                'content' => $attributes['content'],
            ]);
        }

        $url = route('home');
        return view('beeps.alert', compact('url'));
    }

    //发布推文 图片直接传入public/images/beeps目录
    /*public function store(Request $request)
    {
        $this->validate($request, [
            'content' => 'required|max:255',
            'picture' => 'file|nullable'
        ]);

        $beep = new Beep;
        $beep->content = $request->get('content');

        if ($request->hasFile('picture') && $request->file('picture')->isValid()){
            $name = md5(time()) . '.' . $request->file('picture')->extension();
            $request->file('picture')->move('./images/beeps', $name);
            $beep->picture = '/images/beeps/' . $name;
        }

        $beep->user_id = auth()->id();

        if ($beep->save()) {
            $url = route('home');
            return view('beeps.alert', compact('url'));
        } else {
            return redirect()->back()->withInput()->withErrors('发布失败！');
        }
    }*/

    //删除推文
    public function destroy($beep)
    {
        Beep::find($beep)->delete();
        return redirect()->route('home');
    }
}
