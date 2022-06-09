<x-auth-layout>
    <div class="card bg-base-100 rounded border shadow">
        <div class="card-body">
            <x-auth-session-status class="mb-4" :status="session('status')" />
            <x-auth-validation-errors class="mb-4" :errors="$errors" />

            <form action="{{ route('login') }}" method="post">
                @csrf
                <div class="form-group">
                    <label for="email" class="label">
                        <span class="label-text">{{ __('Email') }}</span>
                    </label>
                    <input type="email" name="email" id="email" class="input input-bordered w-full" value="{{ old('email') }}" required autofocus>
                </div>

                <div class="form-group mt-4">
                    <label for="password" class="label">
                        <span class="label-text">{{ __('Password') }}</span>
                    </label>
                    <input type="password" name="password" id="password" class="input input-bordered w-full" required autocomplete="current-password">
                </div>

                <div class="flex items-center justify-end mt-6">
                    @if (Route::has('password.request'))
                        <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
                            {{ __('Forgot your password?') }}
                        </a>
                    @endif

                    <x-button class="ml-3">
                        {{ __('Log in') }}
                    </x-button>
                </div>
            </form>
        </div>
    </div>
</x-auth-layout>
