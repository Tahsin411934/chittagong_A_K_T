<x-app-layout>
<div class=" px-4 grid grid-cols-10 dark:text-white">
        <div class="md:col-span-2">
            @include('Admin.sidebar.sidebar')
        </div>

        <div class="md:col-span-8 mt-5">
            <h1 class="text-2xl font-bold mb-4">Transection Information</h1>
            <div class="overflow-x-auto">
                <table id="example" class="table-auto w-full border-collapse border border-gray-300 text-sm">
                    <thead>
                        <tr class="bg-gray-200 dark:bg-slate-950">
                        <th class="border border-gray-300 px-4 py-2"> Transection ID</th>
                            <th class="border border-gray-300 px-4 py-2">Member ID</th>
                            
                            <th class="border border-gray-300 px-4 py-2">Date</th>
                            <th class="border border-gray-300 px-4 py-2">Debit</th>
                            <th class="border border-gray-300 px-4 py-2">Credit</th>
                            <!-- <th class="border border-gray-300 px-4 py-2">Action</th> -->
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($transections as $transection)
                        <tr>
                        <td class="border border-gray-300 px-4 py-2">{{ $transection->Trans_ID }}</td>
                            <td class="border border-gray-300 px-4 py-2">{{ $transection->Member_ID }}</td>
                            
                            <td class="border border-gray-300 px-4 py-2">{{ $transection->Date }}</td>
                            <td class="border border-gray-300 px-4 py-2">{{ $transection->Debit }}</td>
                            <td class="border border-gray-300 px-4 py-2">{{ $transection->Credit }}</td>
                            <!-- <td class="border border-gray-300 px-4 py-2">
                                <button onclick="openModal({{ json_encode($transection) }})"
                                    class="text-blue-50 btn bg-gray-900 hover:underline hover:bg-slate-900">
                                    View Details & Edit
                                </button>
                            </td> -->
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>