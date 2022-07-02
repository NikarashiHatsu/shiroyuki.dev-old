<div class="flex flex-col items-center mt-3 sm:mt-5 text-xs sm:text-base">
    <span class="tooltip" data-tip="Suka">
        <button
            wire:click="like"
            class="group transition transform duration-300 ease-in-out active:scale-90 hover:bg-red-50 rounded-full p-2"
        >
            @if ($liked)
                <x-phosphor-heart-fill
                    class="transition duration-300 ease-in-out text-red-500 group-hover:text-red-400 w-4 sm:w-6 h-4 sm:h-6" />
            @else
                <x-phosphor-heart
                    class="transition duration-300 ease-in-out group-hover:text-red-500 w-4 sm:w-6 h-4 sm:h-6" />
            @endif
        </button>
    </span>
    <p>
        {{ $likes_count }}
    </p>
</div>