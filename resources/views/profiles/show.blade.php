@extends('layouts.app')

@section('content')
    <header class="mb-6 relative">

        <div class="relative">
            <img src="{{ asset('images/Penguin&Cat.jpg') }}" alt="banner" class="mb-2 rounded-lg">

            <img src="{{ $user->avatar }}"
                 alt="your avatar"
                 class="rounded-full mr-2 absolute bottom-0 transform -translate-x-1/2 translate-y-1/2"
                 style="left: 50%"
                 width="150"
            />
        </div>

        <div class="flex justify-between items-center mb-6">
            <div>
                <h2 class="font-bold text-2xl mb-2">{{ $user->Nickname }}</h2>
                <p>Joined {{ $user->created_at->diffForHumans() }}</p>
            </div>

            <div class="flex">
                @auth
                    @if (auth()->user()->is($user)){{--只能编辑自己的用户档案--}}
                        <a href="{{ $user->path('edit') }}"
                            class="rounded-full border border-gray-300 py-2 px-4 text-black text-xs mr-2"
                        >
                            Edit Profile
                        </a>
                    @endif

                        <form method="POST" action="{{ $user->path('follow') }}">
                        @csrf

                        @if (auth()->user()->isNot($user)){{--只能关注除自己以外的用户--}}
                            <button class="bg-blue-500 rounded-full shadow ml-2 py-1 px-4 text-white text-sm">
                                {{ auth()->user()->following($user) ? 'Unfollow' : 'Follow' }}
                            </button>
                        @endif
                        </form>
                @endauth
            </div>
        </div>

            <p class="text-sm">{{--个人简介，未填写则显示默认信息--}}
            {{ $user->bio ? $user->bio : "This user is idle and doesn't leave anything." }}
        </p>

    </header>

    @include ('timeline', [
        'beeps' => $beeps
    ])

@endsection()
