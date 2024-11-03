<x-app-layout>
    @if (session('success'))
        <div class="bg-green-100 text-green-700 p-4 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif
    <div class="grid grid-cols-10">
        <div class="col-span-2 ">
            @include('user.sidebar.sidebar')
        </div>

        <div id="printableArea"
            class="container  border border-gray-600 w-[70%] mt-2   col-span-8 mx-auto dark:text-gray-100  p-4 rounded-lg shadow-lg">
            <img src="/logo.jpg" alt="" class="w-12 mx-auto   h-12 rounded-full">

            <h1 class="text-2xl font-bold text-center ">Chattogram Akhanda Kalyan Tahabil</h1>
            <div class="text-center text-sm text-slate-400">
                <p>(Chittagong Akhondo Mondoli's Financial Organization)</p>
                <p>Prayer Tempel, 98, Rohomatgonj, Chittagong.</p>
                <p> Establised: 1983</p>
            </div>
            <hr className='-ml-0 h-[1px] border-none dark:bg-slate-200 bg-slate-900 mx-auto w-[80%] ' />
            <div class="text-center">
                <h1 class="text-xl mt-5 font-bold">Deposite Receipt Slip</h1>
                {{-- <div class="text-center text-sm text-slate-400">
                    <p>Date: {{ $deposit->created_at->format('d M Y H:i:s') }}</p>
                </div> --}}
            </div>
            <div class="mt-6 mx-auto px-4 rounded-lg">
                <h1 class="text-lg font-semibold pb-2">Transaction Number: {{ $transection->Trans_ID }}</h1>
                <h1 class="text-lg font-semibold">Member Information:</h1>
                <div class="text-gray-500 ml-48 pb-1">
                    @if ($member)
                    <div>
                        <p>Member ID: {{ $member->Member_ID }}</p>
                        <p>Name: {{ $member->Name }}</p>
                        <p>Current Amount: {{ $member->CurrentAmount }}</p>
                    </div>
                @else
                    <p>Member information not available.</p>
                @endif
                </div>

                <h1 class="text-lg font-semibold pb-1">Deposit Details:</h1>
                <div class="pr-2">


                    <table class="w-full">
                        <tbody class="bg-gray-800 p-5 text-gray-400">
                            <tr>
                                <td class="py-2"><strong>Transaction Number:</strong></td>
                               
                                <td class="py-2">${{ $transection->Trans_ID }}</td>
                            </tr>

                            <tr>
                                <td class="py-2"><strong>Deposit Amount:</strong></td>
                                <td class="py-2">${{ number_format($transection->Debit, 2) }}</td>
                            </tr>
                            <tr>
                                <td class="py-2"><strong>Current Balance:</strong></td>
                                <td class="py-2">{{ number_format($member->CurrentAmount, 2) }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>

            </div>


            <div class="mt-14 mr-6 text-center flex items-center justify-end">
                <button onclick="printDiv('printableArea')"
                    class="bg-blue-500 px-10  text-white p-2 rounded">Print</button>
            </div>
        </div>

    </div>





    <script>
        function printDiv(divId) {
            var printContents = document.getElementById(divId).innerHTML;
            var originalContents = document.body.innerHTML;

            document.body.innerHTML = printContents;

            window.print();

            document.body.innerHTML = originalContents;
            location.reload(); // Reload the page to restore the original content
        }
    </script>
</x-app-layout>
