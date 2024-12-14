<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email Address -->
        <div class="">
            <x-input-label class="text-gray-100" for="UserName" :value="__('UserName')" />
            <x-text-input id="UserName" class="block mt-1 w-full" type="text" name="UserName" :value="old('UserName')"
                required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('UserName')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4 text-gray-100">
            <x-input-label class="text-gray-100" for="password" :value="__('Casier Password')" />

            <x-text-input id="password" class="block mt-1 w-full text-gray-950" type="password" name="password" required
                autocomplete="current-password" />

            <x-input-error :messages="$errors->get('casier_password')" class="mt-2" />
        </div>
        <input class="hidden" type="text" name="type" value="admin" id="">

        <!-- Radio Buttons for Secretary and President -->
        <div class="mt-4 text-gray-100">
            <span class="block mb-2">{{ __('Select Role') }}</span>
            <label class="inline-flex items-center">
                <input type="radio" name="role" value="secretary" id="role-secretary" class="form-radio"
                    onclick="togglePasswordFields()" />
                <span class="ml-2">{{ __('Secretary') }}</span>
            </label>
            <label class="inline-flex items-center ml-6">
                <input type="radio" name="role" value="president" id="role-president" class="form-radio"
                    onclick="togglePasswordFields()" />
                <span class="ml-2">{{ __('President') }}</span>
            </label>
        </div>

        <!-- Secretary Password Field -->
        <div class="mt-4 text-gray-100 hidden" id="secretary-password-field">
            <x-input-label class="text-gray-100" for="secretary-password" :value="__('Secretary Password')" />
            <x-text-input id="secretary-password" class="block mt-1 w-full text-gray-950" type="password" name="secretary_password" />
        </div>

        <!-- President Password Field -->
        <div class="mt-4 text-gray-100 " id="president-password-field">
            <x-input-label class="text-gray-100" for="president-password" :value="__('President Password')" />
            <x-text-input id="president-password" class="block mt-1 w-full text-gray-950" type="password" name="president_password" />
        </div>

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

    <script>
        function togglePasswordFields() {
            const secretaryField = document.getElementById('secretary-password-field');
            const presidentField = document.getElementById('president-password-field');
            const isSecretarySelected = document.getElementById('role-secretary').checked;

            if (isSecretarySelected) {
                secretaryField.classList.remove('hidden');
                presidentField.classList.add('hidden');
            } else {
                presidentField.classList.remove('hidden');
                secretaryField.classList.add('hidden');
            }
        }
    </script>
</x-guest-layout>
