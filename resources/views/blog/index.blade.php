<x-guest-layout>
    <div class='grid grid-cols-12 grid-flow-row gap-4'>
        @foreach ($blogs as $blog)
            <div class='col-span-12 sm:col-span-6 md:col-span-4'>
                <x-post :blog="$blog" />
            </div>
        @endforeach
    </div>
</x-guest-layout>