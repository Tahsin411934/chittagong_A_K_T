<x-app-layout>
    <div class="grid grid-cols-1 md:grid-cols-12 gap-6">
        <div class="md:col-span-3">
            @include('Admin.sidebar.sidebar')
        </div>
        <div class="md:col-span-9 w-[90%] mx-auto mt-16 ">
            <div class="bg-gray-900 p-8 border rounded-lg shadow-md w-full dark:text-white">
                <h1 class="text-2xl font-semibold text-center mb-6">Add New User</h1>

              

                <form action="{{ route('users.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="space-y-6">
                        <div class="grid grid-cols-3 gap-3">
                        <div class="mb-4">
                            <label for="UserName" class="block text-sm font-medium text-gray-100">Username</label>
                            <input type="text" id="UserName" name="UserName" value="{{ old('UserName') }}"
                                class="form-input bg-slate-700 mt-1 block w-full px-4 py-2  border-gray-300 focus:ring-blue-500 focus:border-blue-500" maxlength="50" required>
                            @error('UserName') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                        </div>

                        <div class="mb-4">
                            <label for="Name" class="block text-sm font-medium text-gray-100">Name</label>
                            <input type="text" id="Name" name="Name" value="{{ old('Name') }}"
                                class="form-input bg-slate-700 mt-1 block w-full px-4 py-2  border-gray-300 focus:ring-blue-500 focus:border-blue-500" maxlength="50" required>
                            @error('Name') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                        </div>

                        <div class="mb-4">
                            <label for="Role" class="block text-sm font-medium text-gray-100">Role</label>
                            <select id="Role" name="Role" class="form-select bg-slate-700 mt-1 block w-full px-4 py-2  border-gray-300 focus:ring-blue-500 focus:border-blue-500" required>
                                <option value="">Select Role</option>
                                <option value="admin" {{ old('Role') == 'admin' ? 'selected' : '' }}>Admin</option>
                                <option value="user" {{ old('Role') == 'user' ? 'selected' : '' }}>User</option>
                                <option value="moderator" {{ old('Role') == 'moderator' ? 'selected' : '' }}>Moderator</option>
                            </select>
                            @error('Role') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                        </div>
</div>
<div class="grid grid-cols-2 gap-3">
                        <div class="mb-4">
                            <label for="password" class="block text-sm font-medium text-gray-100">Password</label>
                            <input type="password" id="password" name="password"
                                class="form-input bg-slate-700 mt-1 block w-full px-4 py-2  border-gray-300 focus:ring-blue-500 focus:border-blue-500" maxlength="50" required>
                            @error('password') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                        </div>

                        <div class="mb-4">
                            <label for="password_confirmation" class="block text-sm font-medium text-gray-100">Confirm Password</label>
                            <input type="password" id="password_confirmation" name="password_confirmation"
                                class="form-input bg-slate-700 mt-1 block w-full px-4 py-2  border-gray-300 focus:ring-blue-500 focus:border-blue-500" maxlength="50" required>
                            @error('password_confirmation') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                        </div>

                        <div class="mb-4">
                            <label for="Image" class="block text-sm font-medium text-gray-100">Image</label>
                            <input type="file" id="Image" name="Image"
                                class="form-input bg-slate-700 mt-1 block w-full px-4 py-2  border-gray-300 focus:ring-blue-500 focus:border-blue-500" required>
                            @error('Image') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                        </div>

                        <div class="mb-4">
                            <label for="Signature" class="block text-sm font-medium text-gray-100">Signature</label>
                            <input type="file" id="Signature" name="Signature"
                                class="form-input bg-slate-700 mt-1 block w-full px-4 py-2  border-gray-300 focus:ring-blue-500 focus:border-blue-500" required>
                            @error('Signature') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                        </div>
                        </div>
                        <div>
                            <button type="submit" class="w-full bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600 transition duration-200">
                                Add New User
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            @if(session('success'))
                Toastify({
                    text: "{{ session('success') }}",
                    duration: 3000,
                    close: true,
                    gravity: "top", // Position: top or bottom
                    position: "right", // Position: left, center or right
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
