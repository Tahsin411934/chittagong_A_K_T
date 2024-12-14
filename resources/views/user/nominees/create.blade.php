<x-app-layout>
    @section('title', 'Nominee Registration Form')
    <div class="grid grid-cols-11">

        <!-- Sidebar Section -->
        <div class="col-span-2">
            @include('user.sidebar.sidebar')
        </div>

        <!-- Main Form Section -->
        <div class="container col-span-9 mx-auto p-4 -mt-4 ">
            @if(session('success'))
                <div class="bg-green-100 text-green-700 p-4 rounded mb-4">
                    {{ session('success') }}
                </div>
            @endif

            <form action="{{ route('nominees.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="border border-slate-700 w-[65%] bg-slate-800 mx-auto shadow-2xl ">
                    <div class="text-center pb-8 text-xl dark:text-[#95A5BC] font-semibold">
                        <h1 class="font-bold font-prata pt-3 dark:text-white">Add A Nominee</h1>
                    </div>
                    <div class="px-5 py-3 rounded-xl">

                        <!-- Nominee Information -->
                        <div class="flex items-center gap-2">
                            <div class="w-full mb-4">
                                <label for="member_id" class="block dark:text-gray-50">Member ID</label>
                                <input type="numbe" list="members_list" id="member_id" name="Member_ID"
                                    class=" rounded-lg p-2 w-full dark:text-gray-50 text-gray-700 border border-gray-300 dark:border-gray-700 dark:bg-slate-800" required
                                    placeholder="Type to search...">
                                    
                                <datalist id="members_list">
                                    @foreach($members as $member)
                                        <option value="{{ $member->Member_ID }}">{{ $member->Member_ID }} - {{ $member->Name }}</option>
                                    @endforeach
                                </datalist>
                            </div>
                            <div class="w-full mb-4">
                                <label for="nominee_name" class="block dark:text-gray-100">Nominee Name</label>
                                <input type="text" id="nominee_name" name="Name"
                                    class="border dark:text-gray-50 text-gray-700  rounded-lg p-2 w-full border-gray-300 dark:border-gray-700 dark:bg-slate-800" value="{{ old('nominee_name') }}" required>
                            </div>
                        </div>

                        <!-- Additional Information -->
                        <div class="flex items-center gap-2">
                            <div class="w-full mb-4">
                                <label for="nominee_age" class="block dark:text-gray-100">Nominee Age</label>
                                <input type="number" id="nominee_age" name="Age"
                                    class="border dark:text-gray-50 text-gray-700  rounded-lg p-2 w-full border-gray-300 dark:border-gray-700 dark:bg-slate-800" value="{{ old('nominee_age') }}" required>
                            </div>
                            <div class="w-full mb-4">
                                <label for="nominee_address" class="block dark:text-gray-100">Nominee Address</label>
                                <textarea id="nominee_address" name="Address"
                                    class="border dark:text-gray-50 text-gray-700 rounded-lg h-12 p-2 w-full border-gray-300 dark:border-gray-700 dark:bg-slate-800" required>{{ old('nominee_address') }}</textarea>
                            </div>
                        </div>
                        <div class="flex items-center gap-2">
                            <div class="w-full mb-4">
                                <label for="relation_with_member" class="block dark:text-gray-100">Relation with Member</label>
                                <input type="text" id="relation_with_member" name="Relation"
                                    class="border dark:text-gray-50 text-gray-700  rounded-lg p-2 w-full border-gray-300 dark:border-gray-700 dark:bg-slate-800" value="{{ old('relation_with_member') }}" required>
                            </div>
                            <div class="w-full mb-4">
                                <label for="get_percentage" class="block dark:text-gray-100">Get Percentage</label>
                                <input type="number" id="get_percentage" name="Percentage"
                                    class="border dark:text-gray-50 text-gray-700  rounded-lg p-2 w-full border-gray-300 dark:border-gray-700 dark:bg-slate-800" value="{{ old('get_percentage') }}" required>
                                @error('get_percentage')
                                    <p class="text-red-500 mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                    </div>

                    <!-- File Upload Section -->
                    <div class="w-[70%] mx-auto">
                        <div class="flex items-center justify-center gap-2">
                            <div class="mb-4">
                                <div id="nominee_image_preview" class="mt-2 border rounded-2xl border-gray-400 h-36 w-36 flex items-center justify-center">
                                    <img id="nominee_image_preview_img" src="" alt="Nominee Image Preview" class="max-w-full max-h-full hidden">
                                </div>
                                <label for="nominee_image" class="block text-gray-50">Nominee Image</label>
                                <input required type="file" id="nominee_image" name="Image" class="p-2 w-full dark:text-gray-50 text-gray-700 " accept="image/*">
                            </div>
                            <div class="mb-4">
                                <div id="nominee_signature_preview" class="mt-2 border rounded-2xl border-gray-400 h-36 w-36 flex items-center justify-center">
                                    <img id="nominee_signature_preview_img" src="" alt="Nominee Signature Preview" class="max-w-full max-h-full hidden">
                                </div>
                                <label for="nominee_signature" class="block text-gray-50">Nominee Signature</label>
                                <input type="file" required id="nominee_signature" name="Signature" class="dark:text-gray-50 text-gray-700  p-2 w-full" accept="image/*">
                            </div>
                        </div>
                    </div>

                    <!-- Submit Button -->
                    <div class="text-center p-10">
                        <button type="submit" class="bg-blue-500 text-white  p-2 rounded">Add Nominee</button>
                        <div class="mb-4 mt-5 w-full flex justify-end">
                            <a href="/nominees/create" class="bg-gray-800 border border-blue-50 text-white rounded-lg px-4 py-2">Add another Nominee</a>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <!-- JavaScript for Image Preview -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const nomineeImageInput = document.getElementById('nominee_image');
            const nomineeImagePreview = document.getElementById('nominee_image_preview_img');
            const nomineeSignatureInput = document.getElementById('nominee_signature');
            const nomineeSignaturePreview = document.getElementById('nominee_signature_preview_img');

            function handleImagePreview(input, preview) {
                input.addEventListener('change', function() {
                    const file = input.files[0];
                    if (file) {
                        const reader = new FileReader();
                        reader.onload = function(e) {
                            preview.src = e.target.result;
                            preview.classList.remove('hidden');
                        };
                        reader.readAsDataURL(file);
                    } else {
                        preview.src = '';
                        preview.classList.add('hidden');
                    }
                });
            }

            handleImagePreview(nomineeImageInput, nomineeImagePreview);
            handleImagePreview(nomineeSignatureInput, nomineeSignaturePreview);
        });
    </script>
</x-app-layout>
