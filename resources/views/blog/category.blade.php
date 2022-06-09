<x-guest-layout>
    <x-slot:header>
        <title>Artikel dengan kategori {{ $category->name }} di shiroyuki.dev</title>
        <meta name="author" content="Aghits Nidallah" />
        <meta name="title" content='Shiroyuki.dev, sebuah blog dan catatan pengembangan.' />
        <meta name="description" content="Shiroyuki.dev adalah blog yang memuat pengembangan web terbaru. Biasanya mengisi konten tentang Laravel, Flutter, dan hal lainnya." />
        <meta name="keywords" content="shiroyuki, dev, shiroyuki.dev, hatsu, hatsu shiroyuki, hatsushiroyuki, blog, pengembangan, web, laravel, flutter, android, ios, react, vue, php, python, ruby, java, javascript, css, html, c, c++, c#, swift, kotlin, android, ios, react, vue, php, python, ruby, java, javascript, css, html, c, c++, c#, swift, kotlin" />
        <meta name="robots" content="index,follow" />

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
                <x-post :blog="$blog" />
            </div>
        @endforeach
    </div>
</x-guest-layout>