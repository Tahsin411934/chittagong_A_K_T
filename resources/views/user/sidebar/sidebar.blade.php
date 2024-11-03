<div class="flex flex-col h-screen p-3 w-[240px] bg-transparent border-r dark:border-gray-700 dark:text-white font-inter text-[#0a0a0a] shadow-2xl " >
    <div class="space-y-3">

        <div class="flex items-center justify-between">
            <h2>Dashboard</h2>
            <div class="flex justify-center items-center mt-2">
                @include('user.theme.theme')
            </div>
        </div>

        <div class="relative mb-4">
            <form action="/search" method="GET" class="relative">
                <span class="absolute inset-y-0 left-0 flex items-center py-4">
                    <button type="submit" class="p-2 focus:outline-none focus:ring">
                        <svg fill="currentColor" viewBox="0 0 512 512" class="w-5 h-5 text-gray-600">
                            <path
                                d="M479.6,399.716l-81.084-81.084-62.368-25.767A175.014,175.014,0,0,0,368,192c0-97.047-78.953-176-176-176S16,94.953,16,192,94.953,368,192,368a175.034,175.034,0,0,0,101.619-32.377l25.7,62.2L400.4,478.911a56,56,0,1,0,79.2-79.195ZM48,192c0-79.4,64.6-144,144-144s144,64.6,144,144S271.4,336,192,336,48,271.4,48,192ZM456.971,456.284a24.028,24.028,0,0,1-33.942,0l-76.572-76.572-23.894-57.835L380.4,345.771l76.573,76.572A24.028,24.028,0,0,1,456.971,456.284Z">
                            </path>
                        </svg>
                    </button>
                </span>
                <input type="search" id="searchInput" placeholder="Search..."
                    class="w-full py-2 pl-10 text-sm border rounded-md focus:outline-none dark:bg-gray-100 dark:text-gray-800 focus:dark:bg-gray-50">
            </form>
        </div>

        <div class="flex-1 items-center justify-center ">
            <ul id="navbar" class="pt-2 pb-4 space-y-1 text-sm ">
                <li class="rounded-sm">
                    <a href="/dashboard">
                        <button
                            class="flex {{ request()->is('dashboard') ? 'pb-2 w-full text-[#165BAA]' : '' }} items-center p-2 space-x-3 rounded-md">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="w-4 h-4 fill-current ">
                                <path
                                    d="M469.666,216.45,271.078,33.749a34,34,0,0,0-47.062.98L41.373,217.373,32,226.745V496H208V328h96V496H480V225.958ZM248.038,56.771c.282,0,.108.061-.013.18C247.9,56.832,247.756,56.771,248.038,56.771ZM448,464H336V328a32,32,0,0,0-32-32H208a32,32,0,0,0-32,32V464H64V240L248.038,57.356c.013-.012.014-.023.024-.035L448,240Z">
                                </path>
                            </svg>
                            <span class="font-semibold">Home</span>
                        </button>
                    </a>
                </li>
                <li class="rounded-sm">
                    <a href="/member/create">
                        <button
                            class="flex items-center p-2 space-x-3 rounded-md {{ request()->is('member/create') ? 'pb-2 w-full text-[#165BAA]' : '' }}">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 14c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zM12 16c-4.42 0-8 2.69-8 6v2h16v-2c0-3.31-3.58-6-8-6z" />
                            </svg>
                            <span class="font-semibold">Add New Member</span>
                        </button>
                    </a>
                </li>

                <li class="rounded-sm">
                    <a href="/transection_profiles/create/Deposit">
                        <button
                            class="flex items-center p-2 space-x-3 rounded-md {{ request()->is('transection_profiles/create') ? 'pb-2 w-full text-[#165BAA]' : '' }}">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                                viewBox="0 0 24 24">
                                <path d="M12 5v14m7-7H5" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" />
                            </svg>
                            <span class="font-semibold">Deposit</span>
                        </button>
                    </a>
                </li>

                <li class="rounded-sm">
                    <a href="/transection_profiles/create/withdrawls">
                        <button
                            class="flex items-center p-2 space-x-3 rounded-md {{ request()->is('withdrawals/create') ? 'pb-2 w-full text-[#165BAA]' : '' }}">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                                viewBox="0 0 24 24">
                                <path d="M3 12h18v2H3z" />
                            </svg>
                            <span class="font-semibold">Withdrawals</span>
                        </button>
                    </a>
                </li>

                <li class="rounded-sm">
                    <a href="/memberInfo">
                        <button
                            class="flex items-center p-2 space-x-3 rounded-md {{ request()->is('memberInfo') ? 'pb-2 w-full text-[#165BAA]' : '' }}">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                                viewBox="0 0 24 24">
                                <path
                                    d="M12 0C5.373 0 0 5.373 0 12s5.373 12 12 12 12-5.373 12-12S18.627 0 12 0zm0 22C6.485 22 2 17.515 2 12S6.485 2 12 2s10 4.485 10 10-4.485 10-10 10zm-1-17h2v2h-2zm0 4h2v10h-2z" />
                            </svg>
                            <span class="font-semibold">Member Information</span>
                        </button>
                    </a>
                </li>

                <li class="rounded-sm">
                    <a href="/receipt/create">
                        <button
                            class="flex items-center p-2 space-x-3 rounded-md {{ request()->is('receipt/create') ? 'pb-2 w-full text-[#165BAA]' : '' }}">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"
                                fill="currentColor">
                                <path
                                    d="M19 8h-1V4a2 2 0 0 0-2-2H8a2 2 0 0 0-2 2v4H5a2 2 0 0 0-2 2v10a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V10a2 2 0 0 0-2-2zm-11-4h8v4H8V4zm10 16H6v-8h12v8zm-6-2a2 2 0 1 1 0-4 2 2 0 0 1 0 4zm2-6H8V10h10v2z" />
                            </svg>
                            <span class="font-semibold">Generate Receipt</span>
                        </button>
                    </a>
                </li>

                <li class="rounded-sm">
                    <a href="/transaction-history">
                        <button
                            class="flex items-center p-2 space-x-3 rounded-md {{ request()->is('transaction-history') ? 'pb-2 w-full text-[#165BAA]' : '' }}">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 16 16"
                                class="w-4 h-4">
                                <path
                                    d="M8 0a8 8 0 0 1 8 8 7.93 7.93 0 0 1-1.015 3.859 1 1 0 0 0-.314.783v1.559a1 1 0 0 1-1 1h-1.605a1 1 0 0 1-.982-1.182 1 1 0 0 0 .682-.82A6.028 6.028 0 0 0 8 6a6.028 6.028 0 0 0-4.766 5.435 1 1 0 0 0 .682.82A1 1 0 0 1 3.605 16H2a1 1 0 0 1-1-1v-1.559a1 1 0 0 0-.314-.783A7.93 7.93 0 0 1 0 8 8 8 0 0 1 8 0z">
                                </path>
                            </svg>
                            <span class="font-semibold">Transaction History</span>
                        </button>
                    </a>
                </li>

                <li class="rounded-sm">
                    <a rel="noopener noreferrer" href="#" class="flex items-center p-2 space-x-3 rounded-md">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="w-5 h-5 fill-current ">
                            <path
                                d="M440,424V88H352V13.005L88,58.522V424H16v32h86.9L352,490.358V120h56V456h88V424ZM320,453.642,120,426.056V85.478L320,51Z">
                            </path>
                            <rect width="32" height="64" x="256" y="232"></rect>
                        </svg>
                        <span>Logout</span>
                    </a>
                </li>

                {{-- <li class="rounded-lg font-poppins mt-6 bg-cyan-950 py-3 px-10 w-full border border-sky-950">
                        <div class=" text-center ">
                            @include('clock')
                        </div>
                    </li> --}}
            </ul>
        </div>
    </div>
</div>

<script>
    const searchInput = document.getElementById('searchInput');
    const navbarItems = document.querySelectorAll('#navbar li');

    searchInput.addEventListener('input', function() {
        const filter = searchInput.value.toLowerCase();

        navbarItems.forEach(item => {
            const text = item.textContent.toLowerCase();
            if (text.includes(filter)) {
                item.style.display = ''; // Show item
            } else {
                item.style.display = 'none'; // Hide item
            }
        });
    });
</script>