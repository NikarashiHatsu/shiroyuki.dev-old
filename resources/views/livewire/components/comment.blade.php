<form wire:submit.prevent="store">
    @forelse ($comments as $userComment)
        <div class="flex overflow-clip">
            <div class="flex flex-col items-center mr-5">
                <div class="relative border-r h-3"></div>
                <div class="w-8 h-8 bg-gray-200 rounded-full flex items-center justify-center">
                    {{ $userComment->name[0] ?? "?" }}
                </div>
                <div class="relative border-r h-full"></div>
            </div>
            <div class="flex flex-col rounded border w-full mb-6">
                <div class="text-sm p-3 bg-gray-100 border-b">
                    <span class="font-bold">
                        {{ $userComment->name ?? "Anonim" }}
                    </span>
                    <span class="ml-2 text-xs text-gray-500">
                        {{ $userComment->created_at_formatted }}
                    </span>
                </div>
                <div class="prose-sm px-3 !py-3 md:!py-0">
                    @markdown($userComment->comment)
                </div>
            </div>
        </div>
    @empty
        <p>
            Belum ada komentar yang diberikan. Jadilah yang pertama!
        </p>
    @endforelse

    <hr @class([
        '!mb-12',
        '!mt-0' => count($comments) > 0,
        '!mt-12' => count($comments) == 0,
    ]) />

    <h3>
        Tambahkan komentar
    </h3>
    <div class="grid grid-cols-12 grid-flow-row gap-6">
        <div class="col-span-12 sm:col-span-6">
            <div class="form-group">
                <label class="label">
                    <span class="label-text">Nama</span>
                </label>
                <input
                    wire:model.defer="comment.name"
                    type="text"
                    class="input input-bordered w-full"
                />
                @error('comment.name')
                    <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
                @enderror
            </div>
        </div>
        <div class="col-span-12 sm:col-span-6">
            <div class="form-group">
                <label class="label">
                    <span class="label-text">Email</span>
                </label>
                <input
                    wire:model.defer="comment.email"
                    type="text"
                    class="input input-bordered w-full"
                />
                @error('comment.email')
                    <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
                @enderror
            </div>
        </div>
        <div class="col-span-12">
            <x-comment
                model="comment.comment"
                name="komentar"
                id="komentar"
                label="Komentar"
                value=""
                height="200px"
            />
            <p class="text-sm">
                * Penulisan dengan markdown diperbolehkan
            </p>
            <p class="text-sm mt-0">
                * Jika Nama dan Email dikosongkan, komentar akan membutuhkan approval dari admin
            </p>
        </div>
        <div class="col-span-12">
            <div class="form-group flex justify-end">
                <button type="submit" class="btn btn-primary">
                    <x-phosphor-paper-plane-tilt width="16" height="16" />
                    <span class="ml-2">Kirim</span>
                </button>
            </div>
        </div>
    </div>
</form>