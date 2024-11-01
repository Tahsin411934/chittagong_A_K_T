<x-guest-layout>
    <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data"> <!-- Add enctype -->
        @csrf

        <!-- Username -->
        <div>
            <x-input-label for="UserName" :value="__('UserName')" />
            <x-text-input id="UserName" class="block mt-1 w-full" type="text" name="UserName" :value="old('UserName')" required autofocus autocomplete="UserName" />
            <x-input-error :messages="$errors->get('UserName')" class="mt-2" />
        </div>

        <!-- Name -->
        <div>
            <x-input-label for="Name" :value="__('Name')" />
            <x-text-input id="Name" class="block mt-1 w-full" type="text" name="Name" :value="old('Name')" required autofocus autocomplete="Name" />
            <x-input-error :messages="$errors->get('Name')" class="mt-2" />
        </div>

        <!-- Email Address -->


        <!-- Role -->
        <div>
    <x-input-label for="Role" :value="__('Role')" />
    <select id="Role" class="block mt-1 w-full" name="Role" required autofocus>
        <option value="" disabled selected>{{ __('Select Role') }}</option>
        <option value="User" {{ old('Role') == 'User' ? 'selected' : '' }}>{{ __('User') }}</option>
        <option value="Admin" {{ old('Role') == 'Admin' ? 'selected' : '' }}>{{ __('Admin') }}</option>
        <option value="Ex-President" {{ old('Role') == 'Ex-President' ? 'selected' : '' }}>{{ __('Ex-President') }}</option>
        <option value="Ex-Secretary" {{ old('Role') == 'Ex-Secretary' ? 'selected' : '' }}>{{ __('Ex-Secretary') }}</option>
        <option value="Ex-Cashier" {{ old('Role') == 'Ex-Cashier' ? 'selected' : '' }}>{{ __('Ex-Cashier') }}</option>
        <option value="President" {{ old('Role') == 'President' ? 'selected' : '' }}>{{ __('President') }}</option>
        <option value="Secretary" {{ old('Role') == 'Secretary' ? 'selected' : '' }}>{{ __('Secretary') }}</option>
       
    </select>
    <x-input-error :messages="$errors->get('Role')" class="mt-2" />
</div>


        <!-- Profile Image -->
        <div class="mt-4">
            <x-input-label for="Image" :value="__('Profile Image')" />
            <input type="file" id="Image" name="Image" class="block mt-1 w-full" />
            <x-input-error :messages="$errors->get('Image')" class="mt-2" />
        </div>

        <div class="mt-4">
            <x-input-label for="Signature" :value="__('Signature Image')" />
            <input type="file" id="Signature" name="Signature" class="block mt-1 w-full" />
            <x-input-error :messages="$errors->get('Signature')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />
            <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />
            <x-text-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <!-- Register Button -->
        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ms-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
