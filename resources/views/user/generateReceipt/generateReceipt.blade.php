<x-app-layout>
<div class="grid grid-cols-11 justify-center">
    <!-- Theme Toggle Button -->
    <div class="col-span-2">
        @include('user.sidebar.sidebar')
    </div>

    <!-- Search Form -->
    <div class="col-span-9">
    <form class="w-full" method="GET" action="{{ route('generateReceipt.create') }}">
        <div class="w-full">
            <input 
                class="border rounded-lg p-2 w-full text-gray-900 dark:text-gray-200 dark:bg-gray-800" 
                type="text" 
                name="Trans_ID" 
                placeholder="Enter Transaction ID" 
                required
            >
            <button 
                type="submit" 
                class="bg-blue-500 mt-3 text-white py-2 px-4 rounded hover:bg-blue-600"
            >
                Find
            </button>
        </div>
    </form>

    <!-- Display Transaction and Member Information -->
    @if(isset($transaction) && isset($members))
        <div id="printableArea" class="container border border-gray-600 dark:border-gray-300 w-[70%] mt-2 mx-auto text-gray-900 dark:text-gray-200 p-4 rounded-lg shadow-lg dark:bg-gray-900">
            <img src="/logo.jpg" alt="" class="w-12 mx-auto h-12 rounded-full">
            
            <h1 class="text-2xl font-bold text-center">Chattogram Akhanda Kalyan Tahabil</h1>
            <div class="text-center text-sm text-slate-400 dark:text-slate-500">
                <p>(Chittagong Akhondo Mondoli's Financial Organization)</p>
                <p>Prayer Temple, 98, Rohomatgonj, Chittagong.</p>
                <p>Established: 1983</p>
            </div>
            <hr class="h-[1px] bg-slate-200 dark:bg-slate-700 mx-auto w-[80%]" />

            <div class="text-center">
                <h1 class="text-xl mt-5 font-bold">Withdrawal Receipt Slip</h1>
                <div class="text-sm text-slate-400 dark:text-slate-500">
                    <p >Date: {{$currentDate}}</p>
                </div>
            </div>

            <div class="mt-6 mx-auto p-4 rounded-lg">
                <h1 class="text-lg font-semibold pb-2">Transaction Number: {{ $transaction->Trans_ID }}</h1>
                <h1 class="text-lg font-semibold">Member Information:</h1>
                <div class="text-gray-500 dark:text-gray-400 pb-1 ml-[20%]">
                    <p><strong>Member ID:</strong> {{ $members->Member_ID }}</p>
                    <p><strong>Member Name:</strong> {{ $members->Name }}</p>
                </div>

                <h1 class="text-xl font-bold pb-1">Withdrawal Details:</h1>
                <table class="w-full">
                    <tbody class="bg-gray-800 dark:bg-gray-700 text-gray-400 dark:text-gray-300">
                        <tr>
                            <td class="py-2"><strong>Transaction Number:</strong></td>
                            <td class="py-2">{{ $transaction->Trans_ID }}</td>
                        </tr>
                        {{-- <tr>
                            <td class="py-2"><strong>Balance Before Withdrawal:</strong></td>
                            <td class="py-2">${{ number_format($members->CurrentAmount-, 2) }}</td>
                        </tr> --}}
                       
                        @if ($transaction->Debit>0)
                        <tr>
                            <td class="py-2"><strong>Withdrawal Amount:</strong></td>
                            <td class="py-2">${{ number_format($transaction->Debit, 2) }}</td>
                        </tr>
                        @else
                        <tr>
                            <td class="py-2"><strong>Deposit Amount:</strong></td>
                            <td class="py-2">${{ number_format($transaction->Credit, 2) }}</td>
                        </tr>
                        @endif
                        
                        <tr>
                            <td class="py-2"><strong>Balance After Withdrawal:</strong></td>
                            <td class="py-2">${{ number_format($members->CurrentAmount, 2) }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <div class="mt-4 text-center">
                <button onclick="printDiv('printableArea')" class="bg-blue-500 px-6 text-white p-2 rounded">Print</button>
            </div>
        </div>
    @elseif(request('Trans_ID'))
        <p class="mt-6 text-red-600 dark:text-red-400">No transaction found with that ID.</p>
    @endif

    <!-- Error Message -->
    @if(session('errors'))
        <div class="mt-6 text-red-600 dark:text-red-400">
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

        function toggleTheme() {
            document.documentElement.classList.toggle('dark');
            localStorage.setItem('theme', document.documentElement.classList.contains('dark') ? 'dark' : 'light');
        }

        document.addEventListener('DOMContentLoaded', () => {
            if (localStorage.getItem('theme') === 'dark') {
                document.documentElement.classList.add('dark');
            }
        });
    </script>
</x-app-layout>
