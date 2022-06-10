<x-app-layout
    header="Edit Blog"
    headerPreAction="Kembali"
    headerPreActionLink="{{ route('dashboard.blog.index') }}"
>
    <x-alerts />

    <form method="POST" action="{{ route('dashboard.blog.update', $blog->id) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')
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
                        value="{{ $blog->title }}"
                        required
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
                    <select
                        name="category_id"
                        id="category_id"
                        class="select select-bordered w-full"
                        required
                    >
                        <option value="">-Pilih Kategori-</option>
                        @foreach ($categories as $category)
                            <option {{ $blog->category_id == $category->id ? 'selected' : '' }} value="{{ $category->id }}">
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
                        class="input input-bordered input-disabled w-full"
                        value="{{ $blog->slug }}"
                        readonly
                        required
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
                        <span class="label-text">Thumbnail (16:10) (tidak diubah)</span>
                    </label>
                    <input
                        type="file"
                        name="thumbnail"
                        class="input input-bordered w-full"
                        value="{{ $blog->thumbnail }}"
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
                        <input
                            type="hidden"
                            name="description"
                            id="description"
                            value="{{ $blog->description }}"
                        />
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

            <div class="flex items-end justify-end col-span-12">
                <div class="form-group">
                    <label class="label">
                        <span class="label-text">Status</span>
                    </label>
                    <select
                        name="status"
                        id="status"
                        class="select select-bordered w-full"
                        required
                    >
                        <option value="">-Pilih Status-</option>
                        @foreach ($statuses as $status)
                            <option {{ $status->name == $blog->status ? 'selected' : '' }} value="{{ $status->name }}">
                                {{ $status->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('status')
                        <p class="text-red-500 mt-2 text-sm">
                            {{ $message }}
                        </p>
                    @enderror
                </div>

                <button class="btn btn-primary ml-4">
                    <x-phosphor-floppy-disk width="16" height="16" />
                    <span class="ml-2">
                        Perbarui
                    </span>
                </button>
            </div>
        </div>
    </form>
</x-app-layout>