<x-guest-layout>
    <x-slot:header>
        <title>{{ $blog->title }}</title>
        <meta name="author" content="Aghits Nidallah" />
        <meta name="title" content='Shiroyuki.dev, sebuah blog dan catatan pengembangan.' />
        <meta name="description" content="{{ $blog->description_trimmed }}" />
        <meta name="keywords" content="shiroyuki, dev, shiroyuki.dev, hatsu, hatsu shiroyuki, hatsushiroyuki, blog, pengembangan, web, laravel, flutter, android, ios, react, vue, php, python, ruby, java, javascript, css, html, c, c++, c#, swift, kotlin, android, ios, react, vue, php, python, ruby, java, javascript, css, html, c, c++, c#, swift, kotlin" />
        <meta name="robots" content="index,follow" />

        <meta property="og:title" content="{{ $blog->title }}" />
        <meta property="og:type" content="article" />
        <meta property="og:image" itemProp="image" content="{{ $blog->thumbnail_url }}" />
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

    <div class="grid grid-cols-12 grid-flow-row sm:gap-4 md:gap-6">
        <div class="col-span-2">
            <div class="sticky top-0 left-0 pt-16 flex flex-col items-start sm:items-center">
                <div class="flex flex-col items-center text-xs sm:text-base">
                    <span class="tooltip" data-tip="Pembaca">
                        <button class="p-2 rounded-full cursor-default">
                            <x-phosphor-eye class="w-4 sm:w-6 h-4 sm:h-6" />
                        </button>
                    </span>
                    <span>
                        {{ $blog->views_count }}
                    </span>
                </div>

                @livewire('components.like', [
                    'blog' => $blog->id,
                ])

                <div class="flex flex-col items-center mt-2 sm:mt-4 text-xs sm:text-base">
                    <span class="tooltip" data-tip="Komentar">
                        <button class="p-2 rounded-full cursor-default">
                            <x-phosphor-chat class="w-4 sm:w-6 h-4 sm:h-6" />
                        </button>
                    </span>
                    <span>
                        {{ $blog->comments_count }}
                    </span>
                </div>

                <div class="flex flex-col items-center mt-2 sm:mt-4 text-xs sm:text-base">
                    <span class="tooltip" data-tip="Komentar">
                        <button class="p-2 rounded-full cursor-default">
                            <x-phosphor-clock class="w-4 sm:w-6 h-4 sm:h-6" />
                        </button>
                    </span>
                    <span class="text-center sm:text-left">
                        {{ $blog->read_duration }}
                        <span>mnt</span>
                    </span>
                </div>
            </div>
        </div>

        <div
            class="
                col-span-10
                prose-sm md:prose
                prose-code:bg-red-100 md:prose-code:bg-red-100 prose-code:text-red-700 md:prose-code:text-red-700 prose-code:rounded md:prose-code:rounded prose-code:px-1
                prose-ol:list-decimal
                prose-ul:list-disc
                prose-a:underline
                md:prose-pre:bg-transparent md:prose-pre:p-0
                relative"
        >
            <a class="btn btn-ghost mb-4" href={{ route('index') }}>
                <x-phosphor-arrow-left width="14" height="14" />
                <span class="ml-2">
                    Kembali ke Beranda
                </span>
            </a>
            <div class="aspect-w-16 aspect-h-10 mb-8">
                <img
                    class="w-full h-full rounded object-cover !m-0"
                    alt="Thumbnail dari {{ $blog->title }}"
                    src="{{ $blog->thumbnail_url }}"
                />
            </div>
            <h1 class="mb-4">
                {{ $blog->blog_translation->title }}
            </h1>
            <div class="flex items-center italic opacity-75">
                <span>{{ $blog->user->name }}</span>
                <div class="w-1 h-1 mx-2 rounded-full bg-gray-500"></div>
                <span>{{ $blog->formatted_date }}</span>
            </div>

            @markdown($blog->blog_translation->description)

            <hr class="!my-12" />

            <ins class="adsbygoogle" style="display:block" data-ad-client="ca-pub-6845430784240217" data-ad-slot="2306849892" data-ad-format="auto" data-full-width-responsive="true"></ins>

            <h3 class="!mb-4 !md:mb-0">
                Komentar
            </h3>

            @livewire('components.comment', [
                'blog' => $blog
            ])
        </div>
    </div>
</x-guest-layout>