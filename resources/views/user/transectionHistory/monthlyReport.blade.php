<x-app-layout>
    <div class="grid border grid-cols-10">
        <div class="col-span-2">
            @include('user.sidebar.sidebar')
        </div>
        <div class="col-span-8">
            @include('layouts.viewTransectionTab')

            <div class="container mx-auto">
                <h1 class="text-center mb-4 font-bold text-2xl dark:text-gray-200">
                    Monthly Transaction Report
                </h1>

                <!-- Month and Year Selection Form -->
                <form method="GET" action="{{ route('transaction.monthlyReport') }}" id="monthly-report-form">

                    <!-- Month Selection -->
                    <div class="mb-3">
                        <label for="month" class="form-label">Select Month:</label>
                        <select id="month" name="month" class="form-control text-slate-950" required onchange="this.form.submit()">
                            @for ($m = 1; $m <= 12; $m++)
                                <option value="{{ str_pad($m, 2, '0', STR_PAD_LEFT) }}" 
                                        {{ $selectedMonth == str_pad($m, 2, '0', STR_PAD_LEFT) ? 'selected' : '' }}>
                                    {{ date('F', mktime(0, 0, 0, $m, 1)) }}
                                </option>
                            @endfor
                        </select>
                    </div>

                    <!-- Year Selection -->
                    <div class="mb-3">
                        <label for="year" class="form-label">Select Year:</label>
                        <input type="number" id="year" name="year" class="form-control text-slate-950" 
                               value="{{ $selectedYear }}" required onchange="this.form.submit()">
                    </div>

                </form>

                <!-- Display Transactions -->
                @if($transactions->isNotEmpty())
                    <h2 class="mt-4 text-center">
                        Transactions for {{ \Carbon\Carbon::parse($selectedYear . '-' . $selectedMonth . '-01')->format('F, Y') }}
                    </h2>

                    <!-- Table for displaying transactions -->
                    <div class="overflow-x-auto w-full">
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
                                    <tr class="hover:bg-gray-100 dark:hover:bg-gray-600 transition duration-150 ease-in-out">
                                        <td class="py-2 px-4 border-b">{{ $transaction->Member_ID }}</td>
                                        <td class="py-2 px-4 border-b">{{ $transaction->User_ID }}</td>
                                        <td class="py-2 px-4 border-b">{{ $transaction->Date }}</td>
                                        <td class="py-2 px-4 border-b">{{ $transaction->Debit ?? 'N/A' }}</td>
                                        <td class="py-2 px-4 border-b">{{ $transaction->Credit ?? 'N/A' }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @else
                    <p class="mt-4 text-center">No transactions found for the selected month.</p>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>
