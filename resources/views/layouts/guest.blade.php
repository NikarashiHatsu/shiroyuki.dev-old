<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <meta name="author" content="Aghits Nidallah" />
        <meta name="title" content='Shiroyuki.dev, sebuah blog dan catatan pengembangan.' />
        <meta name="description" content="Shiroyuki.dev adalah blog yang memuat pengembangan web terbaru. Biasanya mengisi konten tentang Laravel, Flutter, dan hal lainnya." />
        <meta name="keywords" content="shiroyuki, dev, shiroyuki.dev, hatsu, hatsu shiroyuki, hatsushiroyuki, blog, pengembangan, web, laravel, flutter, android, ios, react, vue, php, python, ruby, java, javascript, css, html, c, c++, c#, swift, kotlin, android, ios, react, vue, php, python, ruby, java, javascript, css, html, c, c++, c#, swift, kotlin" />
        <meta name="robots" content="index,follow" />

        <meta property="og:title" content="Shiroyuki.dev" />
        <meta property="og:type" content="article" />
        <meta property="og:image" itemProp="image" content={DefaultBanner} />
        <meta property="og:image:alt" content="Shiroyuki.dev adalah blog yang memuat pengembangan web terbaru. Biasanya mengisi konten tentang Laravel, Flutter, dan hal lainnya." />
        <meta property="og:url" content={{ route('index') }} />
        <meta property="og:description" content="Shiroyuki.dev adalah blog yang memuat pengembangan web terbaru. Biasanya mengisi konten tentang Laravel, Flutter, dan hal lainnya." />
        <meta property="og:site_name" content="Shiroyuki.dev" />

        <meta name="twitter:card" content="summary_large_image" />
        <meta name="twitter:site:id" content="irlnidallah" />
        <meta name="twitter:creator:id" content="irlnidallah" />
        <meta name="twitter:title" content="Shiroyuki.dev" />
        <meta name="twitter:description" content="Shiroyuki.dev adalah blog yang memuat pengembangan web terbaru. Biasanya mengisi konten tentang Laravel, Flutter, dan hal lainnya." />

        {{ $header ?? "" }}

        <title>{{ config('app.name', 'Laravel') }}</title>

        <link rel="shortcut icon" href="{{ asset('images/devsnote.svg') }}" type="image/x-icon">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap">
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <script src="{{ asset('js/app.js') }}" defer></script>
    </head>
    <body>
        <div class="font-sans text-gray-900 antialiased">
            <div class='w-full font-sans px-6 2xl:px-0' data-theme="light">
                <div class='border-b'>
                    <div class='max-w-7xl mx-auto'>
                        <div class='flex py-4'>
                            <img class='w-16 mr-2' alt='Logo shiroyuki.dev' src="{{ asset('images/devsnote.svg') }}" />
                            <div class='flex flex-col justify-center'>
                                <h6 class='font-semibold'>
                                    Shiroyuki.dev
                                </h6>
                                <p class='text-sm'>
                                    A Developer's Note
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class='max-w-7xl mx-auto py-6'>
                    <div class='grid grid-cols-12 grid-flow-row gap-6'>
                        <div class='col-span-12 lg:col-span-9'>
                            {{ $slot }}
                        </div>

                        <div class='col-span-12 lg:col-span-3'>
                            <form method="GET" action="{{ route('search') }}">
                                <div class='flex flex-col'>
                                    <label class='label'>
                                        <span class='label-text uppercase font-semibold text-gray-500'>Pencarian</span>
                                    </label>
                                    <div class='input-group'>
                                        <input
                                            type="text"
                                            name='search'
                                            placeholder='Cari...'
                                            class='input input-bordered w-full'
                                        />
                                        <button class='btn btn-square btn-primary'>
                                            <span class='sr-only'>
                                                Cari
                                            </span>
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" strokeWidth="2">
                                                <path strokeLinecap="round" strokeLinejoin="round" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                                            </svg>
                                        </button>
                                    </div>
                                </div>
                            </form>

                            <div class='flex flex-col mt-6'>
                                <label class='label'>
                                    <span class='label-text uppercase font-semibold text-gray-500'>Kategori</span>
                                </label>
                                <ol class="list-inside">
                                    @foreach ($categories as $category)
                                        <li class='mt-2'>
                                            <a href={{ route('category', $category->name) }} class='transition-colors duration-300 ease-in-out flex items-center justify-between text-sm hover:text-primary'>
                                                {{ $category->name }} ({{ $category->blogs_count }})
                                            </a>
                                        </li>
                                    @endforeach
                                </ol>
                            </div>

                            <div class='flex flex-col mt-6'>
                                <label class='label'>
                                    <span class='label-text uppercase font-semibold text-gray-500'>Blog Terbaru</span>
                                </label>
                                @foreach ($latest_blogs as $blog)
                                    <div class='my-2'>
                                        <a href="{{ route('show', $blog->slug) }}" class="flex group">
                                            <img src="{{ $blog->thumbnail_url }}" alt={`Thumbnail dari ${title}`} class='w-24 h-24 rounded object-cover'/>
                                            <div class="flex flex-col ml-3">
                                                <h6 class="transition-colors duration-300 ease-in-out font-semibold line-clamp-2 group-hover:text-primary">
                                                    {{ $blog->title }}
                                                </h6>
                                                <div class="flex items-center mt-1">
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
                                                <p class="text-sm my-1 text-gray-500">
                                                    {{ $blog->user->name }}
                                                </p>
                                                <p class="text-sm text-gray-500">
                                                    {{ $blog->formatted_date}}
                                                </p>
                                            </div>
                                        </a>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
