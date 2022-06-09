<x-app-layout
    header="Pengguna"
    headerPostAction="Tambah"
    headerPostActionLink="{{ route('dashboard.user.create') }}"
>
    <x-alerts />

    <div class="overflow-x-auto">
        <table class="table table-compact w-full mt-6">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Jumlah Blog</th>
                    <th>Jumlah Komentar</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr class="border-t">
                        <th>{{ $loop->iteration }}</th>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->blogs_count}} blog</td>
                        <td>{{ $user->comments_count}} komentar</td>
                        <td>
                            <div class="flex items-center">
                                <a href="{{ route('dashboard.user.edit', $user->id) }}" class="btn btn-success btn-sm">
                                    <x-phosphor-pencil width="16" height="16" />
                                    <span class="ml-2">
                                        Edit
                                    </span>
                                </a>
                                @if ($user->blogs_count == 0 && $user->comments_count == 0)
                                    <form action="{{ route('dashboard.user.destroy', $user->id) }}" method="POST">
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