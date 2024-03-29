<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="google-site-verification" content="" />

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'BeepBeep') }}</title>

    <!-- Fonts -->
    <link href="https://fonts.loli.net/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/main.css') }}" rel="stylesheet">
    <link href="{{ asset('css/image_text_handle.css') }}" rel="stylesheet">
    <link rel="icon" href="{{ asset('images/favicon.png') }}">
</head>
<body style="background-color: #B4DAF0;">
    <div id="app">
        <section class="px-64 py-4 mb-6">
            <header class="container mx-auto">
                <h1>
                    <img src="{{ asset('images/logo.png') }}" alt="BeepBeep Logo">
                </h1>
            </header>
        </section>

        <section class="px-8">
            <main class="container mx-auto">
                <div class="lg:flex lg:justify-center">
                    <div class="lg:w-32">
                        @include('sidebar_links'){{--引入sidebar_links.blade.php文件 侧边栏--}}
                    </div>

                    <div class="lg:flex-1 lg:mx-10 lg:mb-10" style="max-width: 700px">
                        @yield('content')

                        <div>
                            <p>
                                BeepBeep is a very simple Twitter clone written in PHP as an example Laravel application.
                                Used PHP: The Right Way, an easy-to-read, quick reference for PHP popular coding standards.
                            </p>

                            <br />

                            <p>Thanks for these projects:</p>
                            <a href="http://retwis.redis.io/" class="bg-red-500 rounded-full shadow">Retwis, </a>
                            <a href="https://github.com/laracasts/Tweety" class="bg-yellow-500 rounded-full shadow">Tweety, </a>
                            <a href="http://phptherightway.com" class="bg-blue-500 rounded-full shadow">PHP: The Right Way, </a>
                            <a href="https://github.com/AmazonPython" class="bg-purple-500 rounded-full shadow">Finally, my github address</a>

                            <a href="#">
                                <img src="http://phptherightway.com/images/banners/leaderboard-728x90.png" alt="PHP: The Right Way">
                            </a>
                        </div>
                    </div>

                    @auth
                    <div class="lg:w-1/6">
                        @include('friends_list'){{--关注列表--}}
                    </div>
                    @endauth

                </div>
            </main>
        </section>
    </div>

<script src="http://unpkg.com/turbolinks"></script>
<script src="{{ asset('js/characters_check.js') }}"></script>
<script src="{{ asset('js/image_text_handle.js') }}"></script>
<script src="https://libs.baidu.com/jquery/1.9.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/instant.page@5.1.0/instantpage.js" type="module" integrity="sha256-DdSiNPR71ROAVMqT6NiHagLAtZv9EHeByYuVxygZM5g="></script>
</body>
</html>
