<x-app-layout>
    <div class="grid border grid-cols-10 ">
        <div class="col-span-2  text-white rounded-lg shadow-md ">
            @include('user.sidebar.sidebar')
        </div>
        <div class="col-span-8 bg-gray-50 dark:bg-gray-800 p-6 rounded-lg shadow-md">
            @include('layouts.viewTransectionTab')

            <div class="container mx-auto">
                <h1 class="text-center mb-6 font-extrabold text-3xl dark:text-gray-200">
                    Find Member Transaction
                </h1>

                <!-- Member ID Search Form -->
                <form method="GET" action="{{ route('transaction.findByMemberId') }}" id="find-member-form" class="mb-6">
                    <div class="flex justify-center items-center space-x-4">
                        <div class="mb-4 w-full max-w-xs">
                            <label for="member_id" class="block text-gray-700 dark:text-gray-300 text-sm font-medium mb-2">Enter Member ID:</label>
                            <input type="text" id="member_id" name="member_id" class="form-control text-slate-950 w-full p-3 rounded-lg border-2 border-gray-300 dark:border-gray-700 focus:outline-none focus:ring-2 focus:ring-blue-500" 
                                   value="{{ old('member_id') }}" required>
                        </div>
                        <button type="submit" class="btn btn-primary px-6 py-3 bg-blue-500 text-white rounded-lg shadow-md hover:bg-blue-600 focus:outline-none">
                            Find
                        </button>
                    </div>
                </form>

                <!-- Display Transactions if Found -->
                @if(isset($memberId) && $transactions->isNotEmpty())
                    <h2 class="mt-6 text-center text-xl font-bold text-gray-800 dark:text-gray-100">Transactions for Member ID: {{ $memberId }}</h2>

                    <!-- Table for displaying transactions -->
                    <div class="overflow-x-auto w-full mt-6">
                        <table class="min-w-full bg-white dark:bg-gray-800 rounded-lg shadow-md">
                            <thead class="bg-gray-200 dark:bg-gray-700 text-gray-800 dark:text-gray-200">
                                <tr>
                                    <th class="py-3 px-6 border-b">Member ID</th>
                                    <th class="py-3 px-6 border-b">User ID</th>
                                    <th class="py-3 px-6 border-b">Date</th>
                                    <th class="py-3 px-6 border-b">Debit</th>
                                    <th class="py-3 px-6 border-b">Credit</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($transactions as $transaction)
                                    <tr class="dark:text-gray-100 hover:bg-gray-100 dark:hover:bg-gray-600 transition duration-150 ease-in-out">
                                        <td class="py-3 px-6 border-b">{{ $transaction->Member_ID }}</td>
                                        <td class="py-3 px-6 border-b">{{ $transaction->User_ID }}</td>
                                        <td class="py-3 px-6 border-b">{{ $transaction->Date }}</td>
                                        <td class="py-3 px-6 border-b">{{ $transaction->Debit ?? 'N/A' }}</td>
                                        <td class="py-3 px-6 border-b">{{ $transaction->Credit ?? 'N/A' }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @elseif(isset($memberId) && $transactions->isEmpty())
                    <p class="mt-6 text-center text-lg text-gray-600 dark:text-gray-400">No transactions found for Member ID: {{ $memberId }}</p>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>
