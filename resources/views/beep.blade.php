<div class="flex p-4 border-b border-b-gray-400">
    <div class="mr-2 flex-shrink-0">
        <a href="{{ $beep->user->path() }}">
            <img src="{{ $beep->user->avatar }}" alt="your avatar" class="rounded-full mr-2" width="50" height="50">
        </a>
    </div>

    <div>
        <h5 class="font-bold mb-2">
            <a href="{{ $beep->user->path() }}">{{ $beep->user->Nickname }}</a>
        </h5>

        <p style="word-wrap:break-word; word-break:break-all;" class="text-m mb-3">
            {{ $beep->content }}

            @if($beep->picture != null)
                <img src="{{asset('/storage/' . $beep->picture)}}">
            @endif
        </p>

        @auth
            @if (auth()->user()->is($beep->user)){{--只能删除自己的推文--}}

            <form class="ml-64" action="{{ url('beeps/' . $beep->id) }}" method="POST" style="display: inline;">
                {{ method_field('DELETE') }}
                {{ csrf_field() }}

                <button type="submit" class="rounded-lg px-3 shadow border bg-pink-300">Delete</button>
            </form>

            @endif

            @include('like_buttons'){{--Laravel 7之后可以写作<x-like_buttons :beep="$beep" />--}}
        @endauth
    </div>
</div>
