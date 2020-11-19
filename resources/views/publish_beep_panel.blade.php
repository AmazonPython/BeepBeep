<div class="border border-white-400 rounded-lg px-8 py-6 mb-8">
    <form method="POST" action="/beeps" enctype="multipart/form-data">
        @csrf

        <textarea
                name="content"
                class="w-full py-8"
                placeholder="What do you want to say?"
                required autofocus=""
                spellcheck="false"
                onkeyup="checkLength(this);"
        ></textarea>

        <br /><small>文字最大长度: 255，还剩: <span id="chLeft">255</span>.</small>

        <hr class="my-4">

        <footer class="flex justify-between items-center">
            <img src="{{ auth()->user()->avatar }}" alt="your avatar" class="rounded-full mr-2" width="50" height="50">

            <input class=" hidden"
                   type="file"
                   name="picture"
                   id="picture"
                   accept="image/*"
            >
            <label for="picture" class="z-20 flex flex-col-reverse items-center justify-center w-full h-full cursor-pointer">
                <p class="text-s text-blue-900">Click here to upload pictures</p>
                <svg class="z-10 w-8 h-8 text-indigo-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path d="M2 6a2 2 0 012-2h5l2 2h5a2 2 0 012 2v6a2 2 0 01-2 2H4a2 2 0 01-2-2V6z"></path>
                </svg>
            </label>

            @error('picture')
                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
            @enderror

            <button type="submit" class="bg-blue-500 hover:bg-blue-600 rounded-lg shadow px-10 text-sm text-white h-10">
                Publish
            </button>
        </footer>
    </form>

    @error('content')
        <p class="text-red-500 text-sm mt-2">{{ $message }}</p>{{--展示错误信息--}}
    @enderror
</div>
