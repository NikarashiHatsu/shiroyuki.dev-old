<x-app-layout
    header="Kategori"
    headerPostAction="Tambah"
    headerPostActionLink="{{ route('dashboard.category.create') }}"
>
    <x-alerts />

    <div class="overflow-x-auto">
        <table class="table table-compact w-full mt-6">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Kategori</th>
                    <th>Jumlah blog dengan kategori ini</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($categories as $category)
                    <tr class="border-t">
                        <th>{{ $loop->iteration }}</th>
                        <td>{{ $category->name }}</td>
                        <td>{{ $category->blogs_count}} blog</td>
                        <td>
                            <div class="flex items-center">
                                <a href="{{ route('dashboard.category.edit', $category->id) }}" class="btn btn-success btn-sm">
                                    <x-phosphor-pencil width="16" height="16" />
                                    <span class="ml-2">
                                        Edit
                                    </span>
                                </a>
                                @if ($category->blogs_count == 0)
                                    <form action="{{ route('dashboard.category.destroy', $category->id) }}" method="POST">
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