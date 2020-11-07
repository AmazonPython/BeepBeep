@extends('layouts.app'){{--继承自layouts目录app.blade.php--}}

@section('content'){{--渲染内容--}}

@foreach ($users as $user)
<div>
    <a href="{{ $user->path() }}" class="flex items-center mb-5">
        <img src="{{ $user->avatar }}" alt="{{ $user->Nickname }}'s avatar" width="60" class="rounded-full mr-4 rounded">

        <div>
            <h4 class="font-bold">{{ '@' . $user->Nickname }}</h4>
        </div>
    </a>
</div>
@endforeach

    {{ $users->links() }}

@endsection