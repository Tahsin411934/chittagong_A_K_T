<div
    class="flex flex-col h-screen p-3 w-[240px] bg-transparent border-r dark:border-gray-700 dark:text-white font-inter text-[#0a0a0a] shadow-2xl ">
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
                    <a href="/users/create">
                        <button
                            class="flex items-center p-2 space-x-3 rounded-md {{ request()->is('member/create') ? 'pb-2 w-full text-[#165BAA]' : '' }}">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 14c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zM12 16c-4.42 0-8 2.69-8 6v2h16v-2c0-3.31-3.58-6-8-6z" />
                            </svg>
                            <span class="font-semibold">Add New User</span>
                        </button>
                    </a>
                </li>

                <li class="rounded-sm">
                    <a href="/member">
                        <button
                            class="flex items-center p-2 space-x-3 rounded-md {{ request()->is('transection_profiles/create') ? 'pb-2 w-full text-[#165BAA]' : '' }}">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                                viewBox="0 0 24 24">
                                <path
                                    d="M4 20h16v2H4v-2zm13.59-15.41a2 2 0 0 1 2.82 2.82l-12 12a2 2 0 0 1-1.11.57l-4 1a1 1 0 0 1-1.21-1.21l1-4a2 2 0 0 1 .57-1.11l12-12zM15 5.5l3.5 3.5L16 9 12.5 5.5 15 5.5zM6.5 17.5l2.5-.5-2-2-2 .5-.5 2.5 2-.5z" />
                            </svg>

                            <span class="font-semibold">view &Edit Member Info</span>
                        </button>
                    </a>
                </li>

                <li class="rounded-sm">
                    <a href="/view_transaction">
                        <button
                            class="flex items-center p-2 space-x-3 rounded-md {{ request()->is('withdrawals/create') ? 'pb-2 w-full text-[#165BAA]' : '' }}">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                                viewBox="0 0 24 24">
                                <path
                                    d="M6 2h9l5 5v15a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2zm7 1.5v4.5h4.5L13 3.5zM8 12h8v1.5H8V12zm0 3h8v1.5H8V15z" />
                            </svg>

                            <span class="font-semibold">View Trasection</span>
                        </button>
                    </a>
                </li>
                <li class="rounded-sm">
                    <a href="/edit_transaction">
                        <button
                            class="flex items-center p-2 space-x-3 rounded-md {{ request()->is('/generate-receipt/create') ? 'pb-2 w-full text-[#165BAA]' : '' }}">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                                viewBox="0 0 24 24">
                                <path
                                    d="M4 20h16v2H4v-2zm13.59-15.41a2 2 0 0 1 2.82 2.82l-12 12a2 2 0 0 1-1.11.57l-4 1a1 1 0 0 1-1.21-1.21l1-4a2 2 0 0 1 .57-1.11l12-12zM15 5.5l3.5 3.5L16 9 12.5 5.5 15 5.5zM6.5 17.5l2.5-.5-2-2-2 .5-.5 2.5 2-.5z" />
                            </svg>


                            <span class="font-semibold">Edit Transaction Info</span>
                        </button>
                    </a>
                </li>
                <li class="rounded-sm">
                    <a href="/add_bank_account">
                        <button
                            class="flex items-center p-2 space-x-3 rounded-md {{ request()->is('memberInfo') ? 'pb-2 w-full text-[#165BAA]' : '' }}">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                                viewBox="0 0 24 24">
                                <path
                                    d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21 12 17.27z" />
                            </svg>

                            <span class="font-semibold">Benefits</span>
                        </button>
                    </a>
                </li>



                <li class="rounded-sm">
                    <a href="/users/set-role">
                        <button
                            class="flex items-center p-2 space-x-3 rounded-md {{ request()->is('transaction-history') ? 'pb-2 w-full text-[#165BAA]' : '' }}">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                                viewBox="0 0 24 24">
                                <path d="M12 2v20m10-10H2" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" />
                            </svg>



                            <span class="font-semibold">Set Position</span>
                        </button>
                    </a>
                </li>
                <li class="rounded-sm">
                    <a href="/users/reset-password">
                        <button
                            class="flex items-center p-2 space-x-3 rounded-md {{ request()->is('transaction-history') ? 'pb-2 w-full text-[#165BAA]' : '' }}">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                                viewBox="0 0 24 24">
                                <path
                                    d="M12 2a10 10 0 0 0-10 10c0 4.42 2.87 8.16 6.84 9.54l-1.53-2.04c-2.85-.96-4.84-3.65-4.84-6.5 0-3.87 3.13-7 7-7s7 3.13 7 7c0 2.85-2.01 5.54-4.84 6.5l-1.53 2.04A9.97 9.97 0 0 0 12 22c-5.52 0-10-4.48-10-10s4.48-10 10-10zm0 4c-1.66 0-3 1.34-3 3s1.34 3 3 3 3-1.34 3-3-1.34-3-3-3zm0 4c-.55 0-1-.45-1-1s.45-1 1-1 1 .45 1 1-.45 1-1 1z" />
                            </svg>

                            <span class="font-semibold">Reset Password</span>
                        </button>
                    </a>
                </li>
                <li class="rounded-sm">
                    <a href="/transaction-history">
                        <button
                            class="flex items-center p-2 space-x-3 rounded-md {{ request()->is('transaction-history') ? 'pb-2 w-full text-[#165BAA]' : '' }}">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                                viewBox="0 0 24 24">
                                <path
                                    d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 18c-4.41 0-8-3.59-8-8s3.59-8 8-8 8 3.59 8 8-3.59 8-8 8zm-1-6h2v2h-2zm1-7c-1.66 0-3 1.34-3 3s1.34 3 3 3 3-1.34 3-3-1.34-3-3-3z" />
                            </svg>


                            <span class="font-semibold">Report</span>
                        </button>
                    </a>
                </li>
                <li class="rounded-sm">
                    <a href="/transaction-history">
                        <button
                            class="flex items-center p-2 space-x-3 rounded-md {{ request()->is('transaction-history') ? 'pb-2 w-full text-[#165BAA]' : '' }}">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                                viewBox="0 0 24 24">
                                <path
                                    d="M17 2H7c-1.1 0-1.99.9-1.99 2L5 20c0 1.1.89 2 1.99 2h12c1.1 0 1.99-.9 1.99-2V4c0-1.1-.89-2-1.99-2zm-6 14H9v-4h2v4zm4 0h-2v-6h2v6zm-4-10H9V4h2v4z" />
                            </svg>


                            <span class="font-semibold">Help</span>
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