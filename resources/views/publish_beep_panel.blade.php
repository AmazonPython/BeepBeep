<div class="border border-white-400 rounded-lg px-8 py-6 mb-8">
    <form method="POST" action="/beeps">
        @csrf

        <textarea name="content" class="w-full" placeholder="What's up doc?" required autofocus="" spellcheck="false">
        </textarea>

        <hr class="my-4">

        <footer class="flex justify-between items-center">
            <img src="{{ auth()->user()->avatar }}" alt="your avatar" class="rounded-full mr-2" width="50" height="50">

            <button type="submit" class="bg-blue-500 hover:bg-blue-600 rounded-lg shadow px-10 text-sm text-white h-10">
                Publish
            </button>
        </footer>
    </form>

    @error('content')
        <p class="text-red-500 text-sm mt-2">{{ $message }}</p>{{--展示错误信息--}}
    @enderror
</div>
