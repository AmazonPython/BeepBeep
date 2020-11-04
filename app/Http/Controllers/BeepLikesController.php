<?php

namespace App\Http\Controllers;

use App\Beep;

class BeepLikesController extends Controller
{
    public function store(Beep $beep)
    {
        $beep->like(auth()->user());

        return back();
    }

    public function destroy(Beep $beep)
    {
        $beep->dislike(auth()->user());

        return back();
    }
}
