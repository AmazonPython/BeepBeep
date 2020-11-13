@extends('layouts.app')

@section('content')

@auth
    @if (auth()->user()->is($user))
    <form method="POST" action="{{ $user->path() }}" enctype="multipart/form-data">
        @csrf
        @method('PATCH')

        <div class="mb-6">
            <label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="name">
                Name -- This box is not available to change
            </label>

            <input class="border border-gray-400 p-2 w-full"
                   type="text"
                   name="name"
                   id="name"
                   value="{{ $user->name }}"
                   readonly="readonly"
                   required
            >

            @error('name')
                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-6">
            <label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="username">
                Nickname -- Any name as you like
            </label>

            <input class="border border-gray-400 p-2 w-full"
                   type="text"
                   name="Nickname"
                   id="Nickname"
                   value="{{ $user->Nickname }}"
            >

            @error('Nickname')
                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-6">
            <label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="username">
                Bio -- Introduce yourself to everybody ฅ( ̳• ◡ • ̳)ฅ
            </label>

            <textarea class="border border-gray-400 p-2 w-full" type="text" name="bio" id="bio"
            >{{ $user->bio }}</textarea>

            @error('bio')
                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-6">
            <label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="avatar">
                Avatar -- A nice avatar
            </label>

            <div class="flex">
                <input class="border border-gray-400 p-2 w-full"
                       type="file"
                       name="avatar"
                       id="avatar"
                       accept="image/*"
                >

                <img src="{{ $user->avatar }}" alt="your avatar" width="40">
            </div>

            @error('avatar')
                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-6">
            <label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="email">
                Email -- We'll send some messages through this email to you
            </label>

            <input class="border border-gray-400 p-2 w-full"
                   type="email"
                   name="email"
                   id="email"
                   value="{{ $user->email }}"
                   required
                   readonly="readonly"
            >

            @error('email')
                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-6">
            <label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="password">
                Password -- Only you and I know
            </label>

            <input class="border border-gray-400 p-2 w-full"
                   type="password"
                   name="password"
                   id="password"
                   required
            >

            @error('password')
                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-6">
            <label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="password_confirmation">
                Password Confirmation -- Same as above
            </label>

            <input class="border border-gray-400 p-2 w-full"
                   type="password"
                   name="password_confirmation"
                   id="password_confirmation"
                   required
            >

            @error('password_confirmation')
                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-6">
            <button type="submit" class="bg-blue-400 text-white rounded py-2 px-4 hover:bg-blue-500 mr-4">
                Submit
            </button>

            <a href="{{ $user->path() }}" class="hover underline">Cancel</a>
        </div>
    </form>
    @endif
@endauth
@endsection
