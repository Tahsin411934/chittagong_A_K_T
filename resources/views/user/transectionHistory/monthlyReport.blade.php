<x-app-layout>
    <div class="grid grid-cols-10 border border-gray-200 dark:border-gray-700 min-h-screen">
        <!-- Sidebar -->
        <div class="col-span-2 bg-gray-100 dark:bg-gray-900 ">
            @include('user.sidebar.sidebar')
        </div>

        <!-- Main Content -->
        <div class="col-span-8 bg-white dark:bg-gray-800 p-6">
            @include('layouts.viewTransectionTab')

            <div class="container mx-auto">
                <!-- Page Title -->
                <h1 class="text-center mb-6 font-extrabold text-3xl text-gray-800 dark:text-gray-100">
                    Monthly Transaction Report
                </h1>

                <!-- Month and Year Selection Form -->
                <form method="GET" action="{{ route('transaction.monthlyReport') }}" id="monthly-report-form" class="flex flex-col sm:flex-row gap-6 justify-center items-center mb-8">

                    <!-- Month Selection -->
                    <div>
                        <label for="month" class="block text-lg font-medium text-gray-700 dark:text-gray-200 mb-1">Select Month:</label>
                        <select id="month" name="month" class="form-control border border-gray-300 dark:border-gray-600 rounded-lg py-2 px-4 text-gray-800 dark:text-gray-200 bg-white dark:bg-gray-700 focus:ring-2 focus:ring-blue-500 focus:outline-none" required onchange="this.form.submit()">
                            @for ($m = 1; $m <= 12; $m++)
                                <option value="{{ str_pad($m, 2, '0', STR_PAD_LEFT) }}" 
                                        {{ $selectedMonth == str_pad($m, 2, '0', STR_PAD_LEFT) ? 'selected' : '' }}>
                                    {{ date('F', mktime(0, 0, 0, $m, 1)) }}
                                </option>
                            @endfor
                        </select>
                    </div>

                    <!-- Year Selection -->
                    <div>
                        <label for="year" class="block text-lg font-medium text-gray-700 dark:text-gray-200 mb-1">Select Year:</label>
                        <input type="number" id="year" name="year" class="form-control border border-gray-300 dark:border-gray-600 rounded-lg py-2 px-4 text-gray-800 dark:text-gray-200 bg-white dark:bg-gray-700 focus:ring-2 focus:ring-blue-500 focus:outline-none" 
                               value="{{ $selectedYear }}" required onchange="this.form.submit()">
                    </div>

                </form>

                <!-- Display Transactions -->
                @if($transactions->isNotEmpty())
                    <h2 class="mt-4 text-center text-2xl font-semibold text-gray-800 dark:text-gray-200">
                        Transactions for {{ \Carbon\Carbon::parse($selectedYear . '-' . $selectedMonth . '-01')->format('F, Y') }}
                    </h2>

                    <!-- Table for displaying transactions -->
                    <div class="overflow-x-auto mt-6 rounded-lg shadow-lg">
                        <table class="min-w-full bg-white dark:bg-gray-800 border border-gray-300 dark:border-gray-700">
                            <thead>
                                <tr class="bg-gray-200 dark:bg-gray-700 text-gray-800 dark:text-gray-200">
                                    <th class="py-3 px-6 text-left">Member ID</th>
                                    <th class="py-3 px-6 text-left">User ID</th>
                                    <th class="py-3 px-6 text-left">Date</th>
                                    <th class="py-3 px-6 text-right">Debit</th>
                                    <th class="py-3 px-6 text-right">Credit</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
                                @foreach($transactions as $transaction)
                                    <tr class="hover:bg-gray-100 dark:text-gray-300 dark:hover:bg-gray-600 transition duration-150 ease-in-out">
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
                    <p class="mt-8 text-center text-lg text-gray-700 dark:text-gray-300">
                        No transactions found for the selected month.
                    </p>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>
