<x-app-layout>
    <div class="grid border grid-cols-10">
        <!-- Sidebar -->
        <div class="col-span-2">
            @include('user.sidebar.sidebar')
        </div>

        <!-- Main Content -->
        <div class="col-span-8">
            @include('layouts.viewTransectionTab')

            <div class="container mx-auto">
                <h1 class="text-center mb-4 font-bold text-2xl dark:text-gray-200">
                    Daily Transaction History
                </h1>

                <!-- Date Input Form -->
                <form method="GET" action="{{ route('transaction-history.create') }}" id="transaction-form" class="mb-6">
                    <div class="flex items-center gap-4 justify-center">
                        <label for="date" class="text-lg font-medium dark:text-gray-200">
                            Select Date:
                        </label>
                        <input 
                            type="date" 
                            id="date" 
                            name="date" 
                            class="form-control text-slate-950 border rounded-lg py-2 px-3" 
                            value="{{ $selectedDate }}"
                            onchange="this.form.submit()"
                        >
                    </div>
                </form>

                @if(isset($transactions) && count($transactions) > 0)
                    <!-- Transactions Table -->
                    <h2 class="mt-4 text-center text-xl font-semibold dark:text-gray-300">
                        Transactions for {{ $selectedDate }}
                    </h2>

                    <div class="overflow-x-auto w-full mt-4">
                        <table class="min-w-full bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700">
                            <thead>
                                <tr class="bg-gray-200 dark:bg-gray-700 text-gray-800 dark:text-gray-200">
                                    <th class="py-2 px-4 border-b">Member ID</th>
                                    <th class="py-2 px-4 border-b">User ID</th>
                                    <th class="py-2 px-4 border-b">Date</th>
                                    <th class="py-2 px-4 border-b">Debit</th>
                                    <th class="py-2 px-4 border-b">Credit</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($transactions as $transaction)
                                    <tr class="hover:bg-gray-100 dark:hover:bg-gray-600 transition duration-150 ease-in-out dark:text-gray-50">
                                        <td class="py-2 px-4 border-b text-center">{{ $transaction->Member_ID }}</td>
                                        <td class="py-2 px-4 border-b text-center">{{ $transaction->User_ID }}</td>
                                        <td class="py-2 px-4 border-b text-center">{{ $transaction->Date }}</td>
                                        <td class="py-2 px-4 border-b text-center">{{ $transaction->Debit ?? 'N/A' }}</td>
                                        <td class="py-2 px-4 border-b text-center">{{ $transaction->Credit ?? 'N/A' }} </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @else
                    <!-- No Transactions Found -->
                    <p class="mt-6 text-center text-lg text-gray-700 dark:text-gray-300">
                        No transactions found for {{ $selectedDate }}.
                    </p>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>
