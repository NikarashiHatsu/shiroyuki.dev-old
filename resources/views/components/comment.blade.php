@props([
    'id' => 'editor-' . str()->random(8),
    'height' => "400px",
    'label' => null,
    'name' => null,
    'value' => null,
    'model' => null,
])

<div class="form-group">
    @if ($label != null)
        <label class="label">
            <span class="label-text">
                {{ $label }}
            </span>
        </label>
    @endif

    <div
        x-data="{
            height: '{{ $height }}',
            tab: 'write',
            content: '{{ $value }}',
            showConvertedMarkdown: false,
            convertedContent: '',
            convertedMarkdown() {
                this.showConvertedMarkdown = true;
                this.convertedContent = '';
                this.convertedContent = marked.parse(this.content);
                setTimeout(() => {
                    document.querySelectorAll('#commentPreview > pre > code').forEach((block) => hljs.highlightElement(block));
                }, 10);
            }
        }"
        class="relative"
        x-cloak
    >
        <div class="flex items-center bg-gray-50 border border-b-0 border-gray-300 rounded-t-md text-gray-400 pr-4">
            <div class="flex-1">
                <button
                    x-bind:class="{ 'text-indigo-600': tab === 'write' }"
                    x-on:click.prevent="
                        tab = 'write';
                        showConvertedMarkdown = false;
                    "
                    type="button"
                    class="py-2 px-4 inline-block font-semibold"
                >Tulis</button>
                <button
                    x-bind:class="{ 'text-indigo-600': tab === 'preview' && showConvertedMarkdown === true }"
                    x-on:click.prevent="convertedMarkdown(); tab = 'preview';"
                    type="button"
                    class="py-2 px-4 inline-block font-semibold"
                >Pratinjau</button>
            </div>
        </div>

        <textarea
            wire:ignore
            wire:model.defer="{{ $model }}"
            :style="`height: ${height}; max-width: 100%`"
            x-ref="input"
            x-model="content"
            x-show="!showConvertedMarkdown"
            x-init="$wire.on('commentStored', () => {
                content = '';
                convertedContent = '';
            })"
            spellcheck="false"
            name="{{ $name }}"
            id="{{ $id }}"
            class="textarea textarea-bordered font-mono rounded-t-none overflow-y-auto bg-white relative transition duration-300 ease-in-out block w-full text-sm text-gray-700 resize-none"
        ></textarea>

        <div x-show="showConvertedMarkdown" x-cloak>
            <div
                wire:ignore
                id="commentPreview"
                x-html="convertedContent"
                class="w-full prose max-w-none prose-indigo leading-6 rounded-b-md shadow-sm border border-gray-300 p-5 bg-white overflow-y-auto
                    prose-pre:!bg-transparent prose-pre:p-0 prose-code:!rounded"
                :style="`height: ${height}; max-width: 100%`"
            ></div>
        </div>
    </div>

    @error($name)
        <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
    @enderror
</div>