<div class="border border-gray-300 rounded-lg">
    @forelse ($beeps as $beep)
        @include('beep'){{--循环打印推文--}}
    @empty
        <p class="p-4">No beeps yet. A good start is to write your first message!</p>
    @endforelse

    {{ $beeps->links() }}
</div>
