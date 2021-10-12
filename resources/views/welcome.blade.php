@extends('layouts.app')

@section('title')
    {{ config('app.name', 'BeepBeep') }}
@endsection

@section('content')
    <a>
        Browsing BeepBeep is as pleasant as listening a cat's purr.
        <img src="{{ asset('images/background_blue.jpg') }}" class="featurette-image img-fluid mx-auto" alt="githun-octodex-banner-image">
    </a>
@endsection
