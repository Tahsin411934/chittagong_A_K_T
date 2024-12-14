<x-app-layout>
    <div class="grid grid-cols-10 border dark:border-gray-700 min-h-screen">
        <!-- Sidebar -->
        <div class="col-span-2 bg-gray-100 dark:bg-gray-900 ">
            @include('user.sidebar.sidebar')
        </div>

        <!-- Main Content -->
        <div class="col-span-8 bg-white dark:bg-gray-800 p-6">
            @include('layouts.viewTransectionTab')

            <!-- Page Title -->
            <h1 class="text-center mb-6 font-extrabold text-3xl text-gray-800 dark:text-gray-100">
                Daily Transaction History
            </h1>

            <!-- Date Input Form -->
            <form method="GET" action="{{ route('transaction-history.create') }}" id="transaction-form" class="mb-8 flex flex-col sm:flex-row items-center justify-center gap-6">
                <label for="date" class="text-lg font-medium dark:text-gray-200">
                    Select Date:
                </label>
                <input 
                    type="date" 
                    id="date" 
                    name="date" 
                    class="form-control border border-gray-300 dark:border-gray-600 rounded-lg py-2 px-4 focus:ring-2 focus:ring-blue-500 focus:outline-none text-gray-800 dark:text-gray-200 bg-white dark:bg-gray-700" 
                    value="{{ $selectedDate }}" 
                    onchange="this.form.submit()"
                >
            </form>

            <!-- Transactions Section -->
            @if(isset($transactions) && count($transactions) > 0)
                <h2 class="text-center text-2xl font-semibold dark:text-gray-300 mb-4">
                    Transactions for {{ $selectedDate }}
                </h2>

                <!-- Transactions Table -->
                <div class="overflow-x-auto rounded-lg shadow-lg border border-gray-300 dark:border-gray-700">
                    <table class="min-w-full bg-white dark:bg-gray-800">
                        <thead class="bg-gray-200 dark:bg-gray-700 text-gray-800 dark:text-gray-200">
                            <tr>
                                <th class="py-3 px-6 text-left">Member ID</th>
                                <th class="py-3 px-6 text-left">User ID</th>
                                <th class="py-3 px-6 text-left">Date</th>
                                <th class="py-3 px-6 text-right">Debit</th>
                                <th class="py-3 px-6 text-right">Credit</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
                            @foreach($transactions as $transaction)
                                <tr class="hover:bg-gray-100 dark:hover:bg-gray-600 transition duration-150 ease-in-out dark:text-gray-50">
                                    <td class="py-3 px-6">{{ $transaction->Member_ID }}</td>
                                    <td class="py-3 px-6">{{ $transaction->User_ID }}</td>
                                    <td class="py-3 px-6">{{ $transaction->Date }}</td>
                                    <td class="py-3 px-6 text-right">{{ $transaction->Debit ?? 'N/A' }}</td>
                                    <td class="py-3 px-6 text-right">{{ $transaction->Credit ?? 'N/A' }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @else
                <!-- No Transactions Found -->
                <p class="mt-8 text-center text-lg text-gray-700 dark:text-gray-300">
                    No transactions found for {{ $selectedDate }}.
                </p>
            @endif
        </div>
    </div>
</x-app-layout>
