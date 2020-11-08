<div class="border border-gray-300 rounded-lg">
    @forelse ($beeps as $beep)
        @include('beep'){{--循环打印推文--}}
    @empty
        <p class="p-4">No beeps yet.</p>
    @endforelse

    {{ $beeps->links() }}
</div>
