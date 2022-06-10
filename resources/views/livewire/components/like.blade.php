<div class="flex flex-col items-center mt-5">
    <span class="tooltip" data-tip="Suka">
        <button
            wire:click="like"
            class="group transition transform duration-300 ease-in-out active:scale-90 hover:bg-red-50 rounded-full p-2"
        >
            @if ($liked)
                <x-phosphor-heart-fill
                    class="transition duration-300 ease-in-out text-red-500 group-hover:text-red-400" width="24" height="24" />
            @else
                <x-phosphor-heart
                    class="transition duration-300 ease-in-out group-hover:text-red-500" width="24" height="24" />
            @endif
        </button>
    </span>
    <p class="text-sm">
        {{ $likes_count }}
    </p>
</div>