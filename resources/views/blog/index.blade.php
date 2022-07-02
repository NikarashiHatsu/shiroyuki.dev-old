<x-guest-layout>
    <div class='grid grid-cols-12 grid-flow-row gap-4 mb-6'>
        @foreach ($blogs as $blog)
        <div class='col-span-12 sm:col-span-6 md:col-span-4'>
            <x-post :blog="$blog" />
        </div>
        @endforeach
        <ins class="col-span-12 sm:col-span-6 md:col-span-4 adsbygoogle" style="display:block" data-ad-format="fluid" data-ad-layout-key="-73+ed+2i-1n-4w" data-ad-client="ca-pub-6845430784240217" data-ad-slot="9591563103"></ins>
    </div>

    {{ $blogs->links() }}
</x-guest-layout>