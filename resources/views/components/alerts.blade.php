@if (session()->get('success') != null || session()->get('error') != null)
    <div
        @class([
            'mb-4 flex justify-start alert',
            'alert-success' => session()->get('success') != null,
            'alert-error' => session()->get('error') != null,
        ])
    >
        @if (session()->get('success') != null)
            <x-phosphor-check-circle class="flex-none" width="20" height="20" />
            <span className="flex-1">
                {{ session()->get('success') }}
            </span>
        @endif
        @if (session()->get('error') != null)
            <x-phosphor-x-circle class="flex-none" width="20" height="20" />
            <span className="flex-1">
                {{ session()->get('error') }}
            </span>
        @endif
    </div>
@endif