<x-guest-layout>
    <x-slot:header>
        <meta property="og:title" content="Artikel dengan kategori {{ $category->name }} di shiroyuki.dev" />
        <meta property="og:type" content="article" />
        <meta property="og:image" itemProp="image" content={{ asset('images/devsnote-default-banner.png') }} />
        <meta property="og:image:alt" content="Shiroyuki.dev adalah blog yang memuat pengembangan web terbaru. Biasanya mengisi konten tentang Laravel, Flutter, dan hal lainnya." />
        <meta property="og:url" content="{{ route('category', $category->name) }}" />
        <meta property="og:description" content="Shiroyuki.dev adalah blog yang memuat pengembangan web terbaru. Biasanya mengisi konten tentang Laravel, Flutter, dan hal lainnya." />
        <meta property="og:site_name" content="Shiroyuki.dev" />

        <meta name="twitter:card" content="summary_large_image" />
        <meta name="twitter:site:id" content="irlnidallah" />
        <meta name="twitter:creator:id" content="irlnidallah" />
        <meta name="twitter:title" content="Artikel dengan kategori {{ $category->name }} di shiroyuki.dev"/>
        <meta name="twitter:description" content="Shiroyuki.dev adalah blog yang memuat pengembangan web terbaru. Biasanya mengisi konten tentang Laravel, Flutter, dan hal lainnya." />
    </x-slot>

    <a class="btn btn-ghost mb-4" href={{ route('index') }}>
        <x-phosphor-arrow-left width="14" height="14" />
        <span class="ml-2">
            Kembali ke Beranda
        </span>
    </a>

    <h1 class="mb-4 font-bold text-4xl">
        Kategori: {{ $category->name }}
    </h1>

    <div class='grid grid-cols-12 grid-flow-row gap-4'>
        @foreach ($blogs as $blog)
            <div class='col-span-12 sm:col-span-6 md:col-span-4'>
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
                        <p class="text-sm my-1 line-clamp-3 leading-normal whitespace-pre-line">{{ $blog->trimmed_description }}</p>
                    </div>
                </a>
            </div>
        @endforeach
    </div>
</x-guest-layout>