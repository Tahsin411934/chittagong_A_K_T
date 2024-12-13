<x-app-layout>
    <div class="grid grid-cols-1 md:grid-cols-12 gap-6">
        <div class="md:col-span-3">
            @include('Admin.sidebar.sidebar')
        </div>
        <div class="md:col-span-9 w-[70%] mx-auto">
            <div class="bg-gray-900 p-8 border mt-10 rounded-lg shadow-md w-full">
                <h1 class="text-2xl font-semibold text-white text-center mb-6">Reset User Password</h1>

                <!-- Error Message -->
                @if (session('error'))
                <div class="bg-red-500 text-white p-3 mb-4 rounded">
                    {{ session('error') }}
                </div>
                @endif

                <form action="{{ route('users.resetPassword') }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="space-y-6">
                        <!-- Username Field with Datalist -->
                        <div class="mb-4">
                            <label for="UserName" class="block text-sm font-medium text-gray-100">Username</label>
                            <input list="usernames" id="UserName" name="UserName" value="{{ old('UserName') }}"
                                class="form-input mt-1 block text-white w-full px-4 py-2 dark:bg-gray-800 border-gray-300 focus:ring-blue-500 focus:border-blue-500" required>
                            
                            <datalist id="usernames">
                                @foreach ($users as $user)
                                    <option value="{{ $user->UserName }}">{{ $user->UserName }}</option>
                                @endforeach
                            </datalist>

                            @error('UserName') 
                                <span class="text-red-500 text-sm">{{ $message }}</span> 
                            @enderror
                        </div>

                        <!-- Current Password -->
                        <div class="mb-4">
                            <label for="old_password" class="block text-sm font-medium text-gray-100">Old Password</label>
                            <input type="password" id="old_password" name="old_password"
                                value="{{ old('old_password') }}"
                                class="form-input text-white dark:bg-gray-800 mt-1 block w-full px-4 py-2 border-gray-300 focus:ring-blue-500 focus:border-blue-500"
                                required>
                            @error('old_password') 
                                <span class="text-red-500 text-sm">{{ $message }}</span> 
                            @enderror
                        </div>

                        <!-- New Password -->
                        <div class="mb-4">
                            <label for="NewPassword" class="block text-sm font-medium text-gray-100">New Password</label>
                            <input type="password" id="NewPassword" name="NewPassword" value="{{ old('NewPassword') }}"
                                class="form-input dark:bg-gray-800 text-white mt-1 block w-full px-4 py-2 border-gray-300 focus:ring-blue-500 focus:border-blue-500"
                                required>
                            @error('NewPassword') 
                                <span class="text-red-500 text-sm">{{ $message }}</span> 
                            @enderror
                        </div>

                        <!-- Confirm New Password -->
                        <div class="mb-4">
                            <label for="NewPassword_confirmation"
                                class="block text-sm font-medium text-gray-100">Confirm New Password</label>
                            <input type="password" id="NewPassword_confirmation" name="NewPassword_confirmation"
                                value="{{ old('NewPassword_confirmation') }}"
                                class="form-input text-white mt-1 block w-full px-4 py-2 dark:bg-gray-800 border-gray-300 focus:ring-blue-500 focus:border-blue-500"
                                required>
                            @error('NewPassword_confirmation') 
                                <span class="text-red-500 text-sm">{{ $message }}</span> 
                            @enderror
                        </div>

                        <!-- Submit Button -->
                        <div>
                            <button type="submit"
                                class="w-full bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600 transition duration-200">
                                Reset Password
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        @if(session('success'))
            Toastify({
                text: "{{ session('success') }}",
                duration: 3000,
                close: true,
                gravity: "top", // Position: top or bottom
                position: "right", // Position: left, center, or right
                backgroundColor: "linear-gradient(to right, #00b09b, #96c93d)",
            }).showToast();
        @elseif(session('error'))
            Toastify({
                text: "{{ session('error') }}",
                duration: 3000,
                close: true,
                gravity: "top",
                position: "right",
                backgroundColor: "linear-gradient(to right, #ff5f6d, #ffc371)",
            }).showToast();
        @endif
    </script>
</x-app-layout>
