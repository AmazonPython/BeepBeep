@extends('layouts.app'){{--继承自layouts目录app.blade.php--}}

@section('content'){{--渲染内容--}}

    @include('publish_beep_panel'){{--发送推文--}}

    @include('timeline')

@endsection{{--结束渲染--}}
