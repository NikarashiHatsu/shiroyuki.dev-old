<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>{{ config('app.name', 'Laravel') }}</title>
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <script src="{{ asset('js/app.js') }}" defer></script>
    </head>
    <body class="font-sans antialiased">
        <div class='drawer drawer-mobile bg-base-100' data-theme="light">
            <input id="drawer" type="checkbox" class='drawer-toggle' />
            <div class='drawer-content'>
                <div class='flex navbar bg-base-100 border-b justify-between'>
                    <div class='block lg:hidden'>
                        <label for="drawer" class='btn btn-square btn-ghost'>
                            <x-phosphor-list width="16" height="16" />
                        </label>
                    </div>
                    @if ($headerPreAction != null)
                        <a href="{{ $headerPreActionLink }}" class="btn btn-ghost">
                            <x-phosphor-arrow-left width="16" height="16" />
                            <span class='ml-2'>
                                {{ $headerPreAction }}
                            </span>
                        </a>
                    @endif
                    <h5 class='font-semibold text-lg mx-4'>
                        {{ $header }}
                    </h5>
                    @if ($headerPostAction != null)
                        <a href="{{ $headerPostActionLink }}" class="btn btn-ghost">
                            <x-phosphor-plus width="16" height="16" />
                            <span class='ml-2'>
                                {{ $headerPostAction }}
                            </span>
                        </a>
                    @endif
                </div>

                <main class='p-6'>
                    <div>
                        {{ $slot }}
                    </div>
                </main>
            </div>
            <div class='drawer-side border-r'>
                <label for="drawer" class='drawer-overlay'></label>
                <div class='overflow-y-auto w-80 bg-base-200'>
                    <div class='border-b sticky top-0 px-3 py-3 z-50 backdrop-blur'>
                        <a
                            class='flex items-center'
                            href="{{ route('dashboard.index') }}"
                        >
                            <img src="{{ asset('images/devsnote.svg') }}" class='w-12 h-12' />
                            <div class='ml-2 flex flex-col'>
                                <span class='text-sm'>
                                    Shiroyuki.dev
                                </span>
                                <span class='text-xs'>
                                    A Developer's Note
                                </span>
                            </div>
                        </a>
                    </div>

                    <ul class='menu p-4 text-base-content'>
                        <li>
                            <a href="{{ route('index') }}">
                                <x-phosphor-house width="16" height="16" />
                                <span>
                                    Homepage
                                </span>
                            </a>
                        </li>
                        <li>
                            <a
                                href={{ route('dashboard.index') }}
                                class={{ request()->routeIs('dashboard.index') ? 'active' : '' }}
                            >
                                <x-phosphor-gauge width="16" height="16" />
                                <span>
                                    Dashboard
                                </span>
                            </a>
                        </li>

                        <li class='menu-title mt-4'>
                            <span>
                                Data Utama
                            </span>
                        </li>
                        <li>
                            <a
                                href={{ route('dashboard.category.index') }}
                                class={{ request()->routeIs('dashboard.category.*') ? 'active' : '' }}
                            >
                                <x-phosphor-tag width="16" height="16" />
                                <span>
                                    Kategori
                                </span>
                            </a>
                        </li>
                        <li>
                            <a
                                href={{ route('dashboard.blog.index') }}
                                class={{ request()->routeIs('dashboard.blog.*') ? 'active' : '' }}
                            >
                                <x-phosphor-note width="16" height="16" />
                                <span>
                                    Blog
                                </span>
                            </a>
                        </li>
                        <li>
                            <a
                                href={{ route('dashboard.comment.index') }}
                                class={{ request()->routeIs('dashboard.comment.*') ? 'active' : '' }}
                            >
                                <x-phosphor-chat-teardrop-text width="16" height="16" />
                                <span>
                                    Komentar
                                </span>
                            </a>
                        </li>
                        <li>
                            <a
                                href={{ route('dashboard.user.index') }}
                                class={{ request()->routeIs('dashboard.user.*') ? 'active' : '' }}
                            >
                                <x-phosphor-users width="16" height="16" />
                                <span>
                                    Pengguna
                                </span>
                            </a>
                        </li>

                        <li class='menu-title mt-4'>
                            <span>
                                User Control
                            </span>
                        </li>
                        <li>
                            <a
                                href={{ route('dashboard.settings.index') }}
                                class={{ request()->routeIs('dashboard.settings.*') ? 'active' : '' }}
                            >
                                <x-phosphor-gear width="16" height="16" />
                                <span>
                                    Pengaturan
                                </span>
                            </a>
                        </li>

                        <form action="{{ route('logout') }}" method="post" x-ref="form" x-data>
                            @csrf
                            <li>
                                <a href="javascript:void(0)" type="submit" class="hover:bg-red-500 hover:text-white" x-on:click="$refs.form.submit()">
                                    <x-phosphor-sign-out width="16" height="16" />
                                    <span class="ml-2">
                                        Keluar
                                    </span>
                                </a>
                            </li>
                        </form>
                    </ul>
                </div>
            </div>
        </div>
    </body>
</html>
