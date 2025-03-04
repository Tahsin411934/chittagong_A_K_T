<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email Address -->
        <div class="text-gray-100">
            <x-input-label class="text-gray-100" for="UserName" :value="__('UserName')" />
            <x-text-input id="UserName" class="block mt-1 w-full" type="text" name="UserName" :value="old('UserName')"
                required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('UserName')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4 text-gray-100">
            <x-input-label class="text-gray-100" for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required
                autocomplete="current-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>
        <input class="hidden" type="text" name="type" value="user" id="">
        <input class="hidden" type="text" name="hello" value="user" id="">
        <!-- Remember Me -->
        <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox"
                    class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                <span class="ms-2 text-sm text-gray-100">{{ __('Remember me') }}</span>
            </label>
        </div>

        <div class="flex items-center justify-end mt-4">
            @if (Route::has('password.request'))
            <a class="underline text-sm text-gray-100 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                href="{{ route('password.request') }}">
                {{ __('Forgot your password?') }}
            </a>
            @endif

            <x-primary-button class="ms-3 bg-slate-950">
                {{ __('Log in') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>