<x-app-layout
    header="Edit Pengguna"
    headerPreAction="Kembali"
    headerPreActionLink="{{ route('dashboard.user.index') }}"
>
    <x-alerts />

    <form method="POST" action="{{ route('dashboard.user.update', $user->id) }}">
        @csrf
        @method('PUT')
        <div class="grid grid-cols-12 grid-flow-row gap-4">
            <div class="col-span-12 sm:col-span-6 md:col-span-4 lg:col-span-3">
                <div class="form-group">
                    <label class="label">
                        <span class="label-text">Nama Lengkap Pengguna</span>
                    </label>
                    <input
                        type="text"
                        name="name"
                        class="input input-bordered w-full"
                        value="{{ $user->name }}"
                    />
                    @error('name')
                        <p class="text-red-500 mt-2 text-sm">
                            {{ $message }}
                        </p>
                    @enderror
                </div>
            </div>
            <div class="col-span-12 sm:col-span-6 md:col-span-4 lg:col-span-3">
                <div class="form-group">
                    <label class="label">
                        <span class="label-text">Email Pengguna</span>
                    </label>
                    <input
                        type="email"
                        name="email"
                        class="input input-bordered w-full"
                        value="{{ $user->email }}"
                    />
                    @error('email')
                        <p class="text-red-500 mt-2 text-sm">
                            {{ $message }}
                        </p>
                    @enderror
                </div>
            </div>
            <div class="col-span-12 sm:col-span-6 md:col-span-4 lg:col-span-3">
                <div class="form-group">
                    <label class="label">
                        <span class="label-text">Kata Sandi Pengguna</span>
                    </label>
                    <input
                        type="password"
                        name="password"
                        class="input input-bordered w-full"
                        placeholder="(Tidak diubah)"
                    />
                    @error('password')
                        <p class="text-red-500 mt-2 text-sm">
                            {{ $message }}
                        </p>
                    @enderror
                </div>
            </div>
            <div class="col-span-12 sm:col-span-6 md:col-span-4 lg:col-span-3">
                <div class="form-group">
                    <label class="label">
                        <span class="label-text">Konfirmasi Kata Sandi Pengguna</span>
                    </label>
                    <input
                        type="password"
                        name="password_confirmation"
                        class="input input-bordered w-full"
                        placeholder="(Tidak diubah)"
                    />
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