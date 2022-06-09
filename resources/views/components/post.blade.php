<a href="{{ route('show', $blog->slug) }}" class="flex flex-col group border rounded">
    <div class="relative">
        <div class="aspect-w-16 aspect-h-10">
            <img
                src="{{ $blog->thumbnail_url }}"
                alt="{{ $blog->title }}"
                class='w-full h-full rounded-t'
            />
        </div>
        <div class="absolute bottom-0 left-0 p-2">
            <div class="bg-white/75 text-sm p-1 rounded flex items-center backdrop-blur">
                <x-phosphor-tag width="14" height="14" />
                <span class="ml-1">
                    {{ $blog->category->name }}
                </span>
            </div>
        </div>
    </div>
    <div class="flex flex-col p-4">
        <h6 class="transition-colors duration-300 ease-in-out font-semibold line-clamp-2 group-hover:text-primary">
            {{ $blog->title }}
        </h6>
        <div class="flex items-center mt-2">
            <div class="flex">
                <x-phosphor-eye width="14" height="14" />
                <span class="text-xs ml-1">
                    {{ $blog->views_count }}
                </span>
            </div>
            <div class="w-1 h-1 bg-gray-500 rounded-full mx-2"></div>
            <div class="flex">
                <x-phosphor-heart width="14" height="14" />
                <span class="text-xs ml-1">
                    {{ $blog->likes_count }}
                </span>
            </div>
            <div class="w-1 h-1 bg-gray-500 rounded-full mx-2"></div>
            <div class="flex">
                <x-phosphor-chat width="14" height="14" />
                <span class="text-xs ml-1">0</span>
            </div>
        </div>
        <div class="flex items-center text-sm mt-2 mb-1 text-gray-500">
            <span>
                {{ $blog->user->name }}
            </span>
            <div class="w-1 h-1 bg-gray-500 rounded-full mx-2"></div>
            <span>
                {{ $blog->formatted_date }}
            </span>
        </div>
        <p class="text-sm my-1 line-clamp-3 leading-normal whitespace-pre-line">{{ $blog->description_trimmed }}</p>
    </div>
</a>