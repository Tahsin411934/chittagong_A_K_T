<x-app-layout>
<div class="grid grid-cols-11 justify-center bg-gray-100 dark:bg-gray-900 ">
    <!-- Theme Toggle Button -->
    <div class="col-span-2   ">
            @include('user.sidebar.sidebar')
        </div>

    <!-- Search Form -->
    <div class="col-span-9">
        <form class=" w-[95%] mx-auto mt-5 bg-white dark:bg-gray-800 p-6 rounded-lg shadow-lg" method="GET" action="{{ route('generateReceipt.create') }}">
            <h2 class="text-lg font-semibold text-gray-700 dark:text-gray-200 mb-4">Create Transaction Slip</h2>
            <div class="flex items-center gap-4">
                <input 
                    class="flex-1 border rounded-lg p-2 text-gray-900 dark:text-gray-200 dark:bg-gray-700 focus:ring-2 focus:ring-blue-500 outline-none" 
                    type="text" 
                    name="Trans_ID" 
                    placeholder="Enter Transaction ID" 
                    required
                >
                <button 
                    type="submit" 
                    class="bg-blue-500 text-white py-2 px-4 rounded-lg hover:bg-blue-600 focus:ring-2 focus:ring-blue-400 focus:ring-offset-2 focus:ring-offset-gray-100 dark:focus:ring-offset-gray-800"
                >
                Create Transaction Slip
                </button>
            </div>
        </form>

        <!-- Display Transaction and Member Information -->
        @if(isset($transaction) && isset($members))
            <div id="printableArea" class="container border border-gray-300 dark:border-gray-600 w-[70%] mt-6 mx-auto bg-white dark:bg-gray-800 text-gray-900 dark:text-gray-200 p-6 rounded-lg shadow-lg">
                <div class="text-center mb-4">
                    <img src="/logo.jpg" alt="" class="w-16 h-16 mx-auto rounded-full shadow-md">
                    <h1 class="text-2xl font-bold mt-2">Chattogram Akhanda Kalyan Tahabil</h1>
                    <p class="text-sm text-gray-600 dark:text-gray-400">(Chittagong Akhondo Mondoli's Financial Organization)</p>
                    <p class="text-sm text-gray-600 dark:text-gray-400">Prayer Temple, 98, Rohomatgonj, Chittagong.</p>
                    <p class="text-sm text-gray-600 dark:text-gray-400">Established: 1983</p>
                </div>
                <hr class="mb-6 border-gray-300 dark:border-gray-700">

                <div class="text-center mb-4">
                    <h2 class="text-xl font-bold">Transection Receipt Slip</h2>
                    <p class="text-sm text-gray-500 dark:text-gray-400">Date: {{$currentDate}}</p>
                </div>

                <div class="mt-4">
                    <h3 class="text-lg font-semibold">Transaction Details:</h3>
                    <p class="text-gray-600 dark:text-gray-400"><strong>Transaction Number:</strong> {{ $transaction->Trans_ID }}</p>
                </div>

                <div class="mt-4">
                    <h3 class="text-lg font-semibold">Member Information:</h3>
                    <p class="text-gray-600 dark:text-gray-400"><strong>Member ID:</strong> {{ $members->Member_ID }}</p>
                    <p class="text-gray-600 dark:text-gray-400"><strong>Member Name:</strong> {{ $members->Name }}</p>
                </div>

                <div class="mt-4">
                    <h3 class="text-lg font-semibold">Transaction Details:</h3>
                    
<table class="w-full border border-gray-300 dark:border-gray-600 rounded-lg overflow-hidden">
    <thead class="bg-gray-700 dark:bg-gray-800 text-white">
        <tr>
            <th class="py-2 px-4 text-left">Details</th>
            <th class="py-2 px-4 text-left">Value</th>
        </tr>
    </thead>
    <tbody class="bg-gray-50 dark:bg-gray-700 text-gray-800 dark:text-gray-300">
        <tr class="border-t border-gray-300 dark:border-gray-600">
            <td class="py-2 px-4">Transaction Number</td>
            <td class="py-2 px-4">{{ $transaction->Trans_ID }}</td>
        </tr>
        <tr class="border-t border-gray-300 dark:border-gray-600">
            <td class="py-2 px-4">Balance Before Transaction</td>
            <td class="py-2 px-4">
                ${{ number_format($members->CurrentAmount + $transaction->Debit, 2) }}
            </td>
        </tr>
        @if ($transaction->Debit > 0)
        <tr class="border-t border-gray-300 dark:border-gray-600">
            <td class="py-2 px-4">Withdrawal Amount</td>
            <td class="py-2 px-4">${{ number_format($transaction->Debit, 2) }}</td>
        </tr>
        @else
        <tr class="border-t border-gray-300 dark:border-gray-600">
            <td class="py-2 px-4">Deposit Amount</td>
            <td class="py-2 px-4">${{ number_format($transaction->Credit, 2) }}</td>
        </tr>
        @endif
        <tr class="border-t border-gray-300 dark:border-gray-600">
            <td class="py-2 px-4">Balance After Transaction</td>
            <td class="py-2 px-4">${{ number_format($members->CurrentAmount, 2) }}</td>
        </tr>
    </tbody>
</table>

                </div>

                <div class="mt-6 text-center">
                    <button onclick="printDiv('printableArea')" class="bg-blue-500 px-6 text-white py-2 rounded-lg hover:bg-blue-600 focus:ring-2 focus:ring-blue-400 focus:ring-offset-2">
                        Print
                    </button>
                </div>
            </div>
        @elseif(request('Trans_ID'))
            <p class="mt-6 text-red-600 dark:text-red-400 text-center">No transaction found with that ID.</p>
        @endif

        <!-- Error Message -->
        @if(session('errors'))
            <div class="mt-6 text-red-600 dark:text-red-400 text-center">
                {{ session('errors')->first('Trans_ID') }}
            </div>
        @endif
    </div>
</div>

<!-- Print and Theme Toggle Scripts -->
<script>
    function printDiv(divId) {
        var printContents = document.getElementById(divId).innerHTML;
        var originalContents = document.body.innerHTML;

        document.body.innerHTML = printContents;
        window.print();
        document.body.innerHTML = originalContents;
        location.reload();
    }

    document.addEventListener('DOMContentLoaded', () => {
        if (localStorage.getItem('theme') === 'dark') {
            document.documentElement.classList.add('dark');
        }
    });
</script>
</x-app-layout>
