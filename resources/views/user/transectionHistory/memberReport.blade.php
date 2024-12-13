<x-app-layout>
    <div class="grid border grid-cols-10">
        <div class="col-span-2">
            @include('user.sidebar.sidebar')
        </div>
        <div class="col-span-8">
            @include('layouts.viewTransectionTab')

            <div class="container mx-auto">
                <h1 class="text-center mb-4 font-bold text-2xl dark:text-gray-200">
                    Find Member Transaction
                </h1>

                <!-- Member ID Search Form -->
                <form method="GET" action="{{ route('transaction.findByMemberId') }}" id="find-member-form" class="mb-4">
                    <div class="flex justify-center">
                        <div class="mb-3">
                            <label for="member_id" class="form-label">Enter Member ID:</label>
                            <input type="text" id="member_id" name="member_id" class="form-control text-slate-950" 
                                   value="{{ old('member_id') }}" required>
                        </div>
                        <button type="submit" class="btn btn-primary ml-2">Find</button>
                    </div>
                </form>

                <!-- Display Transactions if Found -->
                @if(isset($memberId) && $transactions->isNotEmpty())
                    <h2 class="mt-4 text-center">Transactions for Member ID: {{ $memberId }}</h2>

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
                                    <tr class="hover:bg-gray-100  dark:hover:bg-gray-600 transition duration-150 ease-in-out dark:text-gray-50">
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
                @elseif(isset($memberId) && $transactions->isEmpty())
                    <p class="mt-4 text-center">No transactions found for Member ID: {{ $memberId }}</p>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>
