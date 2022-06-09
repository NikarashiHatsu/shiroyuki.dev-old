<x-app-layout
    header="Tambah Blog"
    headerPreAction="Kembali"
    headerPreActionLink="{{ route('dashboard.blog.index') }}"
>
    <x-alerts />

    <form method="POST" action="{{ route('dashboard.blog.store') }}" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
        <div class="grid grid-cols-12 grid-flow-row gap-4">
            <div class="col-span-12 sm:col-span-6 md:col-span-4 lg:col-span-3">
                <div class="form-group">
                    <label class="label">
                        <span class="label-text">Judul</span>
                    </label>
                    <input
                        type="text"
                        name="title"
                        class="input input-bordered w-full"
                        value="{{ old('title') }}"
                    />
                    @error('title')
                        <p class="text-red-500 mt-2 text-sm">
                            {{ $message }}
                        </p>
                    @enderror
                </div>
            </div>
            <div class="col-span-12 sm:col-span-6 md:col-span-4 lg:col-span-3">
                <div class="form-group">
                    <label class="label">
                        <span class="label-text">Kategori</span>
                    </label>
                    <select name="category_id" id="category_id" class="select select-bordered w-full">
                        <option value="">-Pilih Kategori-</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}">
                                {{ $category->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('category_id')
                        <p class="text-red-500 mt-2 text-sm">
                            {{ $message }}
                        </p>
                    @enderror
                </div>
            </div>
            <div class="col-span-12 sm:col-span-6 md:col-span-4 lg:col-span-3">
                <div class="form-group">
                    <label class="label">
                        <span class="label-text">Slug</span>
                    </label>
                    <input
                        type="text"
                        name="slug"
                        class="input input-bordered w-full"
                        value="{{ old('slug') }}"
                    />
                    @error('slug')
                        <p class="text-red-500 mt-2 text-sm">
                            {{ $message }}
                        </p>
                    @enderror
                </div>
            </div>
            <div class="col-span-12 sm:col-span-6 md:col-span-4 lg:col-span-3">
                <div class="form-group">
                    <label class="label">
                        <span class="label-text">Thumbnail (16:10)</span>
                    </label>
                    <input
                        type="file"
                        name="thumbnail"
                        class="input input-bordered w-full"
                        value="{{ old('thumbnail') }}"
                    />
                    @error('thumbnail')
                        <p class="text-red-500 mt-2 text-sm">
                            {{ $message }}
                        </p>
                    @enderror
                </div>
            </div>
            <div class="col-span-12">
                <div class="form-group">
                    <label class="label">
                        <span class="label-text">Konten</span>
                    </label>
                    <div x-data>
                        <input type="hidden" name="description" id="description" value="" />
                        <div
                            x-on:keyup="document.querySelector('#description').value = editor.getMarkdown()"
                            id="editor"
                        ></div>
                    </div>
                    @error('description')
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