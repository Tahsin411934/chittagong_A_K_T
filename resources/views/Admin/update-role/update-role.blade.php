<x-app-layout>
    <div class="grid grid-cols-1 md:grid-cols-10 gap-6">
        <div class="md:col-span-2">
            @include('Admin.sidebar.sidebar')
        </div>
        <div class="md:col-span-8 w-[60%] mt-10 mx-auto">
            <div class="bg-gray-900 p-8 rounded-lg text-white border shadow-md w-full">
                <h1 class="text-2xl font-semibold text-center mb-6">Set Position</h1>

                <!-- Error Message -->
                @if (session('error'))
                    <div class="bg-red-500 text-white p-3 mb-4 rounded">
                        {{ session('error') }}
                    </div>
                @endif

                <form action="{{ route('users.updateRole') }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="space-y-6">
                        <!-- Username Field with Datalist -->
                        <div class="mb-4">
                            <label for="UserName" class="block text-sm font-medium text-gray-100">Username</label>
                            <input list="usernames" id="UserName" name="UserName" value="{{ old('UserName') }}"
                                class="form-input mt-1 block w-full px-4 py-2 dark:bg-gray-800 border-gray-300 focus:ring-blue-500 focus:border-blue-500" required>
                            
                            <datalist id="usernames">
                                @foreach ($users as $user)
                                    <option value="{{ $user->UserName }}" data-fullname="{{ $user->FullName }}" data-current-position="{{ $user->CurrentPosition }}" data-role="{{ $user->Role }}">
                                        {{ $user->UserName }}
                                    </option>
                                @endforeach
                            </datalist>

                            @error('UserName') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                        </div>

                        <!-- Full Name Field -->
                        <div class="mb-4">
                            <label for="FullName" class="block text-sm font-medium text-gray-100">Full Name</label>
                            <input type="text" id="FullName" name="FullName" value="{{ old('FullName') }}"
                                class="form-input mt-1 block w-full px-4 py-2 dark:bg-gray-800 border-gray-300 focus:ring-blue-500 focus:border-blue-500" required>
                            @error('FullName') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                        </div>

                        <!-- Current Position Field -->
                        <div class="mb-4">
                            <label for="CurrentPosition" class="block text-sm font-medium text-gray-100">Current Position</label>
                            <input type="text" id="CurrentPosition" name="CurrentPosition" value="{{ old('CurrentPosition') }}"
                                class="form-input mt-1 block w-full px-4 py-2 dark:bg-gray-800 border-gray-300 focus:ring-blue-500 focus:border-blue-500" required>
                            @error('CurrentPosition') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                        </div>

                        <!-- Role Dropdown Field -->
                        <div class="mb-4">
                            <label for="Role" class="block text-sm font-medium text-gray-100">Role</label>
                            <select id="Role" name="Role" class="form-select mt-1 block w-full px-4 py-2 dark:bg-gray-800 border-gray-300 focus:ring-blue-500 focus:border-blue-500" required>
                                <option value="">Select Role</option>
                                <option value="President" {{ old('Role') == 'President' ? 'selected' : '' }}>President</option>
                                <option value="user" {{ old('Role') == 'user' ? 'selected' : '' }}>User</option>
                                <option value="Secretary" {{ old('Role') == 'Secretary' ? 'selected' : '' }}>Secretary</option>
                                <option value="Casier" {{ old('Role') == 'Casier' ? 'selected' : '' }}>Casier</option>
                                <option value="Ex-President" {{ old('Role') == 'Ex-President' ? 'selected' : '' }}>Ex-President</option>
                                <option value="Ex-Secretary" {{ old('Role') == 'Ex-Secretary' ? 'selected' : '' }}>Ex-Secretary</option>
                                <option value="Ex-Casier" {{ old('Role') == 'Ex-Casier' ? 'selected' : '' }}>Ex-Casier</option>
                            </select>
                            @error('Role') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                        </div>

                        <!-- Submit Button -->
                        <div>
                            <button type="submit" class="w-full bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600 transition duration-200">
                                Update Role
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        const users = @json($users);
        document.addEventListener("DOMContentLoaded", function () {
            // Auto-fill form fields when username is selected
            const usernameField = document.getElementById("UserName");
            const fullNameField = document.getElementById("FullName");
            const currentPositionField = document.getElementById("CurrentPosition");
            const roleField = document.getElementById("Role");

            // Listen for when the username changes
            usernameField.addEventListener('input', function () {
                const selectedUser = users.find(user => user.UserName === usernameField.value);

                if (selectedUser) {
                    fullNameField.value = selectedUser.Name || '';
                    currentPositionField.value = selectedUser.Role || '';
                   
                } else {
                    fullNameField.value = '';
                    currentPositionField.value = '';
                  
                }
            });

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
        });
    </script>
</x-app-layout>
