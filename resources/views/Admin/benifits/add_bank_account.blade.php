<x-app-layout>
    <div class="grid grid-cols-1 md:grid-cols-10 gap-6">
        <div class="md:col-span-2">
            @include('Admin.sidebar.sidebar')
        </div>
        <div class="container md:col-span-8   w-[60%] mx-auto dark:text-white">
        @include('layouts.benifit_tab')
            <div class="shadow-2xl p-8 border">
                <div class="text-center">
                <h2 class="text-2xl font-bold mb-14">Add Bank Information</h2>
                </div>
                
                <form action="{{ route('bank.store') }}" method="POST" class="space-y-4">
                    @csrf
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <!-- Bank Name -->
                        <div>
                            <label for="bank_name" class="block font-semibold">Bank Name</label>
                            <input type="text" name="bank_name" id="bank_name" required 
                                class="w-full border rounded p-2 bg-gray-700 text-white" 
                                placeholder="Enter Bank Name">
                        </div>
                        <!-- Branch Name -->
                        <div>
                            <label for="branch_name" class="block font-semibold">Branch Name</label>
                            <input type="text" name="branch_name" id="branch_name" required 
                                class="w-full border rounded p-2 bg-gray-700 text-white" 
                                placeholder="Enter Branch Name">
                        </div>
                        
                        <!-- Account Number -->
                        <div>
                            <label for="acc_no" class="block font-semibold">Account Number</label>
                            <input type="text" name="acc_no" id="acc_no" required 
                                class="w-full border rounded p-2 bg-gray-700 text-white" 
                                placeholder="Enter Account Number">
                        </div>
                        <!-- Account Type -->
                        <div>
                            <label for="acc_type" class="block font-semibold">Account Type</label>
                            <select name="acc_type" id="acc_type" 
                                class="w-full border rounded p-2 bg-gray-700 text-white">
                                <option value="Savings">F.D.R</option>
                                <option value="Current">S.B</option>
                            </select>
                        </div>
                        
                        <!-- Opening Year -->
                        <div>
                            <label for="opening_year" class="block font-semibold">Opening Year</label>
                            <input type="number" name="opening_year" id="opening_year" required 
                                class="w-full border rounded p-2 bg-gray-700 text-white" 
                                placeholder="Enter Opening Year">
                        </div>
                        <!-- Duration -->
                        <div>
                            <label for="duration" class="block font-semibold">Duration (Years)</label>
                            <input type="number" name="duration" id="duration" 
                                class="w-full border rounded p-2 bg-gray-700 text-white" 
                                placeholder="Enter Duration">
                        </div>
                        
                        <!-- Opening Amount -->
                        <div>
                            <label for="opening_amount" class="block font-semibold">Opening Amount</label>
                            <input type="number" name="opening_amount" id="opening_amount" required 
                                class="w-full border rounded p-2 bg-gray-700 text-white" 
                                placeholder="Enter Opening Amount">
                        </div>
                        <!-- Is Active -->
                        <div>
                            <label for="active" class="block font-semibold">Is Active?</label>
                            <select name="active" id="active" 
                                class="w-full border rounded p-2 bg-gray-700 text-white">
                                <option value="1">Yes</option>
                                <option value="0">No</option>
                            </select>
                        </div>
                    </div>
                    <!-- Submit Button -->
                    <button type="submit" 
                        class="w-full bg-blue-500 text-white p-2 rounded hover:bg-blue-600 mt-4">
                        Add Bank Info
                    </button>
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
