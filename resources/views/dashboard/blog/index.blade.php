<x-app-layout
    header="Blog"
    headerPostAction="Tambah"
    headerPostActionLink="{{ route('dashboard.blog.create') }}"
>
    <x-alerts />

    <div class="overflow-x-auto">
        <table class="table table-compact w-full mt-6">
            <thead>
                <tr>
                    <th width="50">No</th>
                    <th width="150">Penulis</th>
                    <th width="200">Thumbnail</th>
                    <th width="200">Judul</th>
                    <th width="500">Deskripsi</th>
                    <th width="150">View</th>
                    <th width="150">Komentar</th>
                    <th width="250">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($blogs as $blog)
                    <tr class="border-t">
                        <th>{{ $loop->iteration }}</th>
                        <td>{{ $blog->user->name }}</td>
                        <td>
                            <div class="aspect-w-16 aspect-h-10">
                                <a href="{{ $blog->thumbnail_url }}" target="_blank">
                                    <img class="w-full h-full border rounded object-cover" src={{ $blog->thumbnail_url }} />
                                </a>
                            </div>
                        </td>
                        <td>
                            <p class="break-words whitespace-pre-wrap line-clamp-5">{{ $blog->title }}</p>
                        </td>
                        <td>
                            <p class="break-words whitespace-pre-wrap line-clamp-5">{{ $blog->description_trimmed }}</p>
                        </td>
                        <td>
                            <div class="flex flex-col items-center">
                                <x-phosphor-eye width="16" height="16" />
                                {{ $blog->views_count }}
                            </div>
                        </td>
                        <td>
                            <div class="flex flex-col items-center">
                                <x-phosphor-chat width="16" height="16" />
                                {{ $blog->comments_count }}
                            </div>
                        </td>
                        <td>
                            <div class="flex items-center">
                                <a href="{{ route('dashboard.blog.edit', $blog->id) }}" class="btn btn-success btn-sm">
                                    <x-phosphor-pencil width="16" height="16" />
                                    <span class="ml-2">
                                        Edit
                                    </span>
                                </a>
                                @if ($blog->comments_count == 0)
                                    <form action="{{ route('dashboard.blog.destroy', $blog->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-error btn-sm ml-2">
                                            <x-phosphor-trash width="16" height="16" />
                                            <span class="ml-2">
                                                Hapus
                                            </span>
                                        </button>
                                    </form>
                                @endif
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-app-layout>