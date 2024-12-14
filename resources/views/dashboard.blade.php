<x-app-layout>
    <div class="grid grid-cols-10">
        <div class="col-span-2 bg-gray-100 dark:bg-gray-900">
            @include('user.sidebar.sidebar')
        </div>

        <div class="col-span-8">
            <section class="p-6 my-6 bg-gray-200 dark:bg-gray-800 text-gray-800 dark:text-gray-100">
                <div class="container grid grid-cols-1 gap-6 mx-auto sm:grid-cols-2 xl:grid-cols-3">
                    <!-- Total Members -->
                    <div class="p-4 space-x-4 rounded-lg md:space-x-6 bg-slate-300 dark:bg-gray-900 text-gray-800 dark:text-gray-100">
                        <div class="text-center">
                            <p class="text-3xl font-semibold leading-none">{{ \App\Models\Member::count() }}</p>
                            <p class="capitalize">Total Members</p>
                        </div>
                    </div>

                    <!-- Total Withdrawals -->
                    <div class="p-4 space-x-4 bg-slate-300 rounded-lg md:space-x-6 dark:bg-gray-900 text-gray-800 dark:text-gray-100">
                        
                        <div class="flex flex-col items-center justify-center align-middle">
                            <p class="text-3xl font-semibold leading-none">{{ \App\Models\TransectionProfile::count() }}</p>
                            <p class="capitalize">Transactions</p>
                        </div>
                    </div>

                    <!-- Total Nominees -->
                    <div class="p-4 space-x-4 bg-slate-300 rounded-lg md:space-x-6 dark:bg-gray-900 text-gray-800 dark:text-gray-100">
                        
                        <div class="flex flex-col items-center justify-center align-middle">
                            <p class="text-3xl font-semibold leading-none">{{ \App\Models\Nominee::count() }}</p>
                            <p class="capitalize">Total Nominees</p>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Flex wrapper for chart and table -->
            <div class="flex mt-10 w-full space-x-4 my-6">
                <!-- Chart section -->
                <section class="flex-1 p-6 bg-gray-200 dark:bg-gray-800 text-gray-800 dark:text-gray-100">
                    <div class="w-full mx-auto">
                        <canvas id="transactionsChart" width="400" height="400"></canvas> <!-- Increased chart size -->
                    </div>
                </section>

                <!-- Table section -->
                <div class="flex-1 mr-5">
                    @if($Transections->isEmpty())
                        <p class="text-gray-500 dark:text-gray-400">No Recent transactions found.</p>
                    @else
                        <table class="min-w-full bg-white dark:bg-gray-900 rounded-lg shadow-md">
                            <thead>
                                <tr class="bg-gray-200 dark:bg-gray-700 text-gray-600 dark:text-gray-200 uppercase text-sm leading-normal">
                                    <h2 class="text-lg dark:text-white text-center font-semibold dark:bg-gray-700 border-b">Recent Transactions</h2>
                                    <th class="py-3 px-6 text-left">Transaction Id</th>
                                    <th class="py-3 px-6 text-left">Member ID</th>
                                    <th class="py-3 px-6 text-left">Debit</th>
                                    <th class="py-3 px-6 text-left">Credit</th>
                                </tr>
                            </thead>
                            <tbody class="text-gray-600 dark:text-gray-300 text-sm font-light">
                                @foreach($Transections as $withdrawal)
                                <tr class="border-b border-gray-200 dark:border-gray-700 hover:bg-gray-100 dark:hover:bg-gray-800">
                                    <td class="py-3 px-6 text-left">{{ $withdrawal->Trans_ID }}</td>
                                    <th class="py-3 px-6 text-left">{{$withdrawal->Member_ID}}</th>
                                    <td class="py-3 px-6 text-left">{{ $withdrawal->Debit }}</td>
                                    <td class="py-3 px-6 text-left">{{ $withdrawal->Credit }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <!-- Chart.js Datalabels Plugin -->
    <script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels"></script>

    <script>
        // Get the data passed from the controller
        const years = @json($years);  // Array of years
        const counts = @json($counts);  // Array of transaction counts per year

        const ctx = document.getElementById('transactionsChart').getContext('2d');
        new Chart(ctx, {
            type: 'line',  // Change to line chart
            data: {
                labels: years,  // X-axis labels are the years
                datasets: [{
                    label: 'Yearly Transactions',
                    data: counts,  // Y-axis data is the count of transactions
                    backgroundColor: 'rgba(52, 152, 219, 0.2)',  // Light blue fill for the area under the line
                    borderColor: '#3498db',  // Blue line color
                    borderWidth: 2,  // Line thickness
                    tension: 0.4,  // Smooth line curves
                    pointRadius: 6,  // Larger points for data markers
                    pointBackgroundColor: '#3498db',  // Point color
                    pointBorderColor: '#fff',  // Point border color
                    pointBorderWidth: 2,  // Point border width
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,  // Allow resizing
                plugins: {
                    datalabels: {
                        formatter: (value, context) => {
                            return value;  // Display transaction count on data points
                        },
                        color: '#fff',  // White color for labels
                        font: {
                            weight: 'bold',  // Bold font for labels
                            size: 16  // Larger font size for readability
                        }
                    }
                },
                scales: {
                    x: {
                        title: {
                            display: true,
                            text: 'Year',  // X-axis title
                            font: {
                                size: 20,  // Larger font size for axis title
                                weight: 'bold'
                            },
                            color: '#2C3E50'  // Darker color for axis title
                        },
                        ticks: {
                            font: {
                                size: 16,  // Font size for axis labels
                                weight: 'normal'
                            },
                            color: '#7F8C8D'  // Color for axis labels
                        }
                    },
                    y: {
                        title: {
                            display: true,
                            text: 'Transactions Count',  // Y-axis title
                            font: {
                                size: 20,  // Larger font size for axis title
                                weight: 'bold'
                            },
                            color: '#2C3E50'  // Darker color for axis title
                        },
                        ticks: {
                            font: {
                                size: 16,  // Font size for axis labels
                                weight: 'normal'
                            },
                            color: '#7F8C8D',  // Color for axis labels
                            beginAtZero: true,  // Ensure y-axis starts at 0
                        }
                    }
                },
                layout: {
                    padding: {
                        left: 30,
                        right: 30,
                        top: 30,
                        bottom: 30
                    }
                },
                animation: {
                    duration: 1500,  // Smooth animation duration
                    easing: 'easeInOutQuad'  // Smooth easing for transitions
                }
            }
        });
    </script>
</x-app-layout>
