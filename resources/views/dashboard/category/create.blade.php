<x-app-layout
    header="Tambah Kategori"
    headerPreAction="Kembali"
    headerPreActionLink="{{ route('dashboard.category.index') }}"
>
    <x-alerts />

    <form method="POST" action="{{ route('dashboard.category.store') }}">
        @csrf
        <div class="grid grid-cols-12 grid-flow-row gap-4">
            <div class="col-span-12 sm:col-span-6 md:col-span-4 lg:col-span-3">
                <div class="form-group">
                    <label class="label">
                        <span class="label-text">Nama Kategori</span>
                    </label>
                    <input
                        type="text"
                        name="name"
                        class="input input-bordered w-full"
                        value="{{ old('name') }}"
                    />
                    @error('name')
                        <p class="text-red-500 mt-2 text-sm">
                            {{ $message }}
                        </p>
                    @enderror
                </div>
            </div>
            <div class="col-span-12">
                <div class="flex justify-end">
                    <button class="btn btn-primary">
                        <x-phosphor-floppy-disk width="16" height="16" />
                        <span class="ml-2">
                            Simpan
                        </span>
                    </button>
                </div>
            </div>
        </div>
    </form>
</x-app-layout>