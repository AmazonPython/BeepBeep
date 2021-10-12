<ul>
    @auth
        <li>
            <a class="font-bold text-lg mb-4 block" href="{{ route('home') }}">
                Home
            </a>
        </li>
        <li>
            <a class="font-bold text-lg mb-4 block" href="{{ auth()->user()->path() }}">
                Profile
            </a>
        </li>
        <li>
            <a class="font-bold text-lg mb-4 block" href="/explore">
                Explore
            </a>
        </li>
        <li>
            <form method="POST" action="/logout">
                @csrf
                <button class="font-bold text-lg">Logout</button>
            </form>
        </li>
    @else
        <li>
            <a class="font-bold text-lg mb-4 block" href="{{ route('home') }}">
                Login
            </a>
        </li>
        <li>
            <a class="font-bold text-lg mb-4 block" href="/explore">
                Explore
            </a>
        </li>
    @endauth
</ul>
