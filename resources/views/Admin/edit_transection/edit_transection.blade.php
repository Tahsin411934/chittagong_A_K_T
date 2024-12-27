<x-app-layout>
    <div class="grid grid-cols-1 md:grid-cols-10 gap-6">
        <div class="md:col-span-2">
            @include('Admin.sidebar.sidebar')
        </div>
        <div class="container md:col-span-8 w-[60%] mx-auto  dark:text-white ">
            <div class="shadow-2xl p-8 mt-8 border ">
                <h2 class="text-lg font-bold mb-4">Edit Transaction</h2>
                <form id="transactionForm" action="{{ route('transaction.update') }}" method="POST">
                    @csrf
                    @method('PUT')

                    <!-- Transaction ID -->
                    <div class="mb-4 >
                    <label for=" transaction_id" class="block text-sm font-medium">Transaction ID</label>
                        <input type="text" name="transaction_id" id="transaction_id" list="transactionList"
                            class="form-control dark:bg-gray-800 border-gray-300 rounded-md shadow-sm w-full"
                            placeholder="Select or enter Transaction ID" required>
                        <datalist id="transactionList">
                            @foreach($transections as $transection)
                            <option value="{{ $transection->Trans_ID }}">{{ $transection->Trans_ID }}</option>
                            @endforeach
                        </datalist>
                    </div>

                    <!-- Other fields (Debit, Credit, Corrected Amount) -->
                    <div class="mb-4">
                        <label for="previous_debit" class="block text-sm font-medium">Previous Debit</label>
                        <input type="number" name="previous_debit" id="previous_debit"
                            class="form-control dark:bg-gray-800 border-gray-300 rounded-md shadow-sm w-full" readonly>
                    </div>
                    <div class="mb-4">
                        <label for="previous_credit" class="block text-sm font-medium">Previous Credit</label>
                        <input type="number" name="previous_credit" id="previous_credit"
                            class="form-control dark:bg-gray-800 border-gray-300 rounded-md shadow-sm w-full" readonly>
                    </div>
                    <div class="flex items-center  space-x-6 mt-6">
                        <label
                            class="flex items-center space-x-2 bg-gray-100 dark:bg-gray-800 p-3 rounded-lg shadow-md cursor-pointer hover:bg-gray-200 dark:hover:bg-gray-700 transition duration-300">
                            <input type="radio" name="transactionType" value="debit" class="hidden peer">
                            <span
                                class="w-4 h-4 border-2 border-gray-400 rounded-full peer-checked:bg-blue-500 peer-checked:border-blue-500 transition"></span>
                            <span class="text-gray-700 dark:text-gray-300 font-medium">Debit</span>
                        </label>
                        <label
                            class="flex items-center space-x-2 bg-gray-100 dark:bg-gray-800 p-3 rounded-lg shadow-md cursor-pointer hover:bg-gray-200 dark:hover:bg-gray-700 transition duration-300">
                            <input type="radio" name="transactionType" value="credit" class="hidden peer">
                            <span
                                class="w-4 h-4 border-2 border-gray-400 rounded-full peer-checked:bg-blue-500 peer-checked:border-blue-500 transition"></span>
                            <span class="text-gray-700 dark:text-gray-300 font-medium">Credit</span>
                        </label>
                    </div>


                    <div class="mb-4">
                        <label for="corrected_amount" class="block text-sm font-medium">Corrected Amount</label>
                        <input type="number" name="corrected_amount" id="corrected_amount"
                            class="form-control dark:bg-gray-800 border-gray-300 rounded-md shadow-sm w-full"
                            placeholder="Enter Corrected Amount" required>
                    </div>

                    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md">Update
                        Transaction</button>
                </form>
            </div>
        </div>
    </div>

    <!-- JavaScript to handle auto field functionality -->
    <script>
    // Fetch transactions as JSON from the server
    const transactions = @json($transections);

    document.addEventListener('DOMContentLoaded', () => {
        const transactionIdInput = document.getElementById('transaction_id');
        const previousDebitInput = document.getElementById('previous_debit');
        const previousCreditInput = document.getElementById('previous_credit');

        transactionIdInput.addEventListener('input', () => {
            const selectedTransaction = transactions.find(
                transaction => transaction.Trans_ID == transactionIdInput.value
            );

            if (selectedTransaction) {
                previousDebitInput.value = selectedTransaction.Debit || 0;
                previousCreditInput.value = selectedTransaction.Credit || 0;
            } else {
                previousDebitInput.value = '';
                previousCreditInput.value = '';
            }
        });
    });
    </script>
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