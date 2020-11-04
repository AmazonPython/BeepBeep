@extends('layouts.app')

@section('content')
<div class="container mx-auto flex justify-center">
    <div class="block mb-2 mr-8 uppercase font-bold text-2xl text-gray-700">Register</div>

    <form method="POST" action="{{ route('register') }}">
        @csrf

        <div class="mb-6">
            <label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="username">
                Name
            </label>

            <input class="border border-gray-400 p-2 w-full"
                   type="text"
                   name="name"
                   id="name"
                   autocomplete="name"
                   autofocus
                   placeholder="This box is not available to change"
                   value="{{ old('name') }}"
                   required
            >

            @error('name')
                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-6">
            <label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="name">
                NickName
            </label>

            <input class="border border-gray-400 p-2 w-full"
                   type="text"
                   name="Nickname"
                   id="Nickname"
                   placeholder="Any name as you like"
                   value="{{ old('Nickname') }}"
                   required
            >

            @error('Nickname')
                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-6">
            <label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="email">
                Email
            </label>

            <input class="border border-gray-400 p-2 w-full"
                   type="email"
                   name="email"
                   id="email"
                   value="{{ old('email') }}"
                   autocomplete="email"
                   placeholder="Used to reset the password"
                   required
            >

            @error('email')
                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-6">
            <label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="password">
                Password
            </label>

            <input class="border border-gray-400 p-2 w-full"
                   type="password"
                   name="password"
                   id="password"
                   autocomplete="new-password"
                   placeholder="Only you and I know"
            >

            @error('password')
                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-6">
            <label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="password_confirmation">
                Password Confirmation
            </label>

            <input class="border border-gray-400 p-2 w-full"
                   type="password"
                   name="password_confirmation"
                   id="password_confirmation"
                   autocomplete="new-password"
                   placeholder="Same as above"
            >

            @error('password_confirmation')
                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <button type="submit" class="bg-blue-400 text-white rounded py-2 px-4 hover:bg-blue-500">
                Register
            </button>

            <a href="{{ route('login') }}" class="text-s text-gray-700">
                Already registered? Login here!
            </a>
        </div>
    </form>
</div>
@endsection
