<x-guest-layout>
    <x-slot:header>
        <meta property="og:title" content="{{ $blog->title }}" />
        <meta property="og:type" content="article" />
        <meta property="og:image" itemProp="image" content={blog.thumbnail_url} />
        <meta property="og:image:alt" content="{{ $blog->title }}" />
        <meta property="og:url" content="{{ route('show', $blog->slug) }}" />
        <meta property="og:description" content="{{ $blog->description_trimmed }}" />
        <meta property="og:site_name" content="Shiroyuki.dev" />

        <meta name="twitter:card" content="summary_large_image" />
        <meta name="twitter:site:id" content="irlnidallah" />
        <meta name="twitter:creator:id" content="irlnidallah" />
        <meta name="twitter:title" content="{{ $blog->title }}" />
        <meta name="twitter:description" content="{{ $blog->description_trimmed }}" />
    </x-slot>

    <div
        class="
            prose prose-slate
            prose-h1:leading-snug
            prose-img:rounded-lg
            prose-pre:!bg-gray-900 prose-code:!bg-transparent"
    >
        <a class="btn btn-ghost mb-4" href={{ route('index') }}>
            <x-phosphor-arrow-left width="14" height="14" />
            <span class="ml-2">
                Kembali ke Beranda
            </span>
        </a>
        <div class="aspect-w-16 aspect-h-10 mb-8">
            <img
                class="w-full h-full rounded object-cover m-0"
                alt="Thumbnail dari {{ $blog->title }}"
                src="{{ $blog->thumbnail_url }}"
            />
        </div>
        <h1 class="mb-4">
            {{ $blog->title }}
        </h1>
        <div class="flex items-center mt-2">
            <div class="flex items-center">
                <x-phosphor-eye width="14" height="14" />
                <span class="ml-2">
                    {{ $blog->views_count }}
                </span>
            </div>
            <div class="w-1 h-1 bg-gray-500 rounded-full mx-4"></div>
            <div class="flex items-center">
                <x-phosphor-chat width="14" height="14" />
                <span class="ml-2">0</span>
            </div>
        </div>
        <div class="flex items-center">
            <span>{{ $blog->user->name }}</span>
            <div class="w-1 h-1 mx-2 rounded-full bg-gray-500"></div>
            <span>{{ $blog->formatted_date }}</span>
        </div>

        @markdown($blog->description)
    </div>
</x-guest-layout>