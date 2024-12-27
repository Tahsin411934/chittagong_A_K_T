<x-app-layout>
    <div class="grid grid-cols-1 md:grid-cols-10 gap-6">
        <div class="md:col-span-2">
            @include('Admin.sidebar.sidebar')
        </div>
        <div class="container md:col-span-8   w-[60%] mx-auto dark:text-white">
            @include('layouts.benifit_tab')
            <div class="shadow-2xl p-8 border">
                <div class="">
                    <div class="container mx-auto p-6">
                        <h2 class="text-2xl font-semibold mb-6">Add Bank Interest</h2>

                        <form action="{{ route('bank.transaction.store') }}" method="POST" class="space-y-4">
                            @csrf
                            <div>
                                <label for="bank_acc_id" class="block text-sm font-medium text-gray-100">Bank Name
                                </label>
                                <select name="bank_acc_id" id="bank_acc_id"
                                    class="w-full dark:bg-slate-700 p-2 border border-gray-300 rounded" required>
                                    <option value="" disabled selected>Select a Bank </option>
                                    @foreach($banks as $bank)
                                    <option value="{{ $bank->Bank_Acc_Id }}">{{ $bank->Bank_Acc_Id }} -
                                        {{ $bank->Bank_Name }} ({{ $bank->Branch_Name }})</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="hidden">
                                <label for="cause" class="block text-sm font-medium text-gray-700">Cause</label>
                                <input type="text" name="cause" id="cause" value="interest added"
                                    class="w-full dark:bg-slate-700 p-2 border border-gray-300 rounded" required>
                            </div>





                            <div>
                                <label for="year" class="block text-sm font-medium text-gray-100">Year</label>
                                <input type="number" name="year" id="year"
                                    class="w-full dark:bg-slate-700 p-2 border border-gray-300 rounded" required>
                            </div>


                            <div>
                                <label for="credit" class="block text-sm font-medium text-gray-100">Amount</label>
                                <input type="number" name="amount" id="credit"
                                    class="w-full dark:bg-slate-700 p-2 border border-gray-300 rounded">
                            </div>

                            <button type="submit" class="w-full bg-blue-500 text-white p-2 rounded hover:bg-blue-600">
                                Add Interest
                            </button>
                        </form>
                    </div>
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