<x-app-layout>
    <div class="font-poppins grid grid-cols-11">
        <div class="col-span-2 shadow-2xl">
            @include('user.sidebar.sidebar')
        </div>

        <div class="container mx-auto mt-10 p-6 col-span-9">
            @if(session('success'))
            <div id="successMessage" class="bg-green-100 text-green-700 p-4 rounded mb-4">
                {{ session('success') }}
            </div>
            @endif

            <form action="{{ route('transection_profiles.store') }}" method="POST" class="w-[65%] mx-auto bg-slate-200 dark:bg-gray-800 py-4 px-8 border border-gray-700 rounded-xl" id="transactionForm">
                @csrf

                <div class="grid grid-cols-5 items-center">
                    <div class="col-span-2 mb-4 h-32 w-32">
                        <div id="member_image" class="border border-gray-600 rounded-lg h-32 w-32">
                            <img src="/images/525_image.jpg" width="350" height="350" id="image_display" class="h-32 w-32 rounded-lg p-2" style="display:none;">
                            <p id="image_path" class="dark:text-gray-600 hidden -mb-10"></p>
                            {{-- <img src="/images/525_image.jpg" alt=""> --}}
                        </div>
                    </div>
                    <div class="col-span-3 text-xl font-bold font-prata dark:text-gray-50">
                        <h1>Make A Deposit</h1>
                        <div class="font-base dark:text-gray-400 text-sm mt-6">
                            <div id="date"></div>
                            <div id="time"></div>
                        </div>
                    </div>
                </div>

                <div class="w-full mb-4">
                    <label for="member_id" class="block dark:text-gray-50">Member ID</label>
                    <input type="number" list="members_list" id="member_id" name="Member_ID" class="rounded-lg p-2 w-full dark:text-gray-50 text-gray-700 border border-gray-300 dark:border-gray-700 dark:bg-slate-800" placeholder="Type to search..." required>
                    <datalist id="members_list">
                        @foreach($members as $member)
                        <option value="{{ $member->Member_ID }}">{{ $member->Member_ID }} - {{ $member->Name }}</option>
                        @endforeach
                    </datalist>
                </div>

                <div class="mb-4">
                    <label for="member_name" class="block dark:text-gray-50">Member Name</label>
                    <input type="text" id="member_name" class="border text-gray-900 rounded-lg p-2 w-full" readonly>
                </div>

                <div class="mb-4">
                    <label for="Date" class="block dark:text-gray-50">Date:</label>
                    <input type="date" id="Date" name="Date" value="{{ \Carbon\Carbon::now()->format('Y-m-d') }}" class="border text-gray-900 rounded-lg p-2 w-full" required>
                </div>

                <div class="mb-4">
                    <label for="balance" class="block dark:text-gray-50">Balance</label>
                    <input type="text" id="balance" name="balance" class="border text-gray-900 rounded-lg p-2 w-full" value="{{ old('balance') }}" readonly>
                </div>

                <div class="mb-4">
                    <label for="Debit" class="block dark:text-gray-50">Debit:</label>
                    <input type="number" step="0.01" id="Debit" name="Debit" class="border text-gray-900 rounded-lg p-2 w-full" placeholder="Enter Debit Amount" required>
                </div>

                <div class="mb-4">
                    <label for="current_balance" class="block dark:text-gray-50">Current Balance</label>
                    <input type="text" id="current_balance" class="border rounded-lg text-gray-900 p-2 w-full" value="{{ old('current_balance') }}" readonly>
                </div>

                <div class="text-center">
                    <button type="submit" class="bg-blue-500 text-white p-2 rounded-lg hover:bg-blue-600">
                        Save Transaction
                    </button>
                </div>
            </form>
        </div>
        <h1>{ imagePath }</h1>
    </div>

    <script>
        const members = @json($members);
    
        document.addEventListener('DOMContentLoaded', function() {
            const successMessage = document.getElementById('successMessage');
            if (successMessage) {
                setTimeout(() => {
                    document.getElementById('transactionForm').reset();
                    successMessage.style.display = 'none';
                }, 3000);
            }
    
            const memberInput = document.getElementById('member_id');
            const memberName = document.getElementById('member_name');
            const balanceInput = document.getElementById('balance');
            const currentBalance = document.getElementById('current_balance');
            const debitInput = document.getElementById('Debit');
            const imageDisplay = document.getElementById('image_display');
    
            memberInput.addEventListener('input', function() {
                const selectedMember = members.find(member => member.Member_ID == memberInput.value);
    
                if (selectedMember) {
                    memberName.value = selectedMember.Name;
                    balanceInput.value = selectedMember.CurrentAmount;
    
                    // Update the image path and display
                    const imageUrl = selectedMember.Image ? `/${selectedMember.Image}` : ''; // Ensure leading slash if needed
                    const imagePath = document.getElementById('image_path');
    
                    // Load image
                    const img = new Image();
                    img.src = imageUrl;
                    img.onload = function() {
                        imageDisplay.src = imageUrl; 
                        imageDisplay.style.display = 'block'; // Show the image if it loads successfully
                    };
                    img.onerror = function() {
                        imageDisplay.style.display = 'none'; // Hide if image fails to load
                    };
    
                    imagePath.textContent = imageUrl; // Display the image path
                } else {
                    clearFields();
                }
            });
    
            debitInput.addEventListener('input', updateCurrentBalance);
    
            function updateCurrentBalance() {
                const balance = parseFloat(balanceInput.value) || 0;
                const debit = parseFloat(debitInput.value) || 0;
                currentBalance.value = (balance + debit).toFixed(2);
            }
    
            function clearFields() {
                memberName.value = '';
                balanceInput.value = '';
                currentBalance.value = '';
                imageDisplay.style.display = 'none'; // Hide the image display
            }
    
            function updateDateTime() {
                const now = new Date();
                const optionsDate = {
                    year: 'numeric',
                    month: 'long',
                    day: 'numeric'
                };
                const formattedDate = now.toLocaleDateString('en-US', optionsDate);
    
                const optionsTime = {
                    hour: '2-digit',
                    minute: '2-digit',
                    second: '2-digit',
                    hour12: false
                };
                const formattedTime = now.toLocaleTimeString('en-US', optionsTime);
    
                document.getElementById('date').innerText = `Date: ${formattedDate}`;
                document.getElementById('time').innerText = `Time: ${formattedTime}`;
            }
    
            updateDateTime();
            setInterval(updateDateTime, 1000);
        });
    </script>
    
    
</x-app-layout>
