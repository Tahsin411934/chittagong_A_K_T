<div class="max-w-full mt-2 mb-2">
    <div class="flex items-center justify-start flex-nowrap dark:bg-[#1F2937] dark:text-gray-100">

        <a rel="noopener noreferrer" href="{{ url('add_bank_account') }}"
            class="flex items-center flex-shrink-0 px-5 py-3 space-x-2 {{ request()->is('add_bank_account') ? 'border-t border-r-2 border-l-2 border-gray-700 font-bold text-green-200 dark:text-green-200' : 'border-b dark:border-gray-600 dark:text-gray-100' }}">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-4 h-4">
                <circle cx="12" cy="12" r="10"></circle>
                <polygon points="16.24 7.76 14.12 14.12 7.76 16.24 9.88 9.88 16.24 7.76"></polygon>
            </svg>
            <span class="">add bank account</span>
        </a>

        <a rel="noopener noreferrer" href="{{ url('add_interest') }}"
            class="flex items-center flex-shrink-0 px-5 py-3 space-x-2 {{ request()->is('add_interest') ? 'border-t border-r-2 border-l-2 border-gray-700 font-bold text-green-200 dark:text-green-200' : 'border-b dark:border-gray-600 dark:text-gray-100' }}">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-6 h-6">
                <rect x="3" y="4" width="10" height="10" rx="2" ry="2" fill="none" />
                <path d="M16 2v4M8 2v4M3 10h18" />
                <path d="M8 12h3v6H8zM12 16h3v2h-3zM15 14h3v4h-3z" />
            </svg>

            <span>Add Interest</span>
        </a>

        <a rel="noopener noreferrer" href="{{ url('deduction_interest') }}"
            class="flex items-center flex-shrink-0 px-5 py-3 space-x-2 {{ request()->is('deduction_interest') ? 'border-t border-r-2 border-l-2 border-gray-700 font-bold text-green-200 dark:text-green-200' : 'border-b dark:border-gray-600 dark:text-gray-100' }}">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-4 h-4">
                <path d="M19 21l-7-5-7 5V5a2 2 0 0 1 2-2h10a2 2 0 0 1 2 2z"></path>
            </svg>
            <span>Deduction Interest</span>
        </a>
        <a rel="noopener noreferrer" href="{{ url('banifit_canculation') }}"
            class="flex items-center flex-shrink-0 px-5 py-3 space-x-2 {{ request()->is('banifit_canculation') ? 'border-t border-r-2 border-l-2 border-gray-700 font-bold text-green-200 dark:text-green-200' : 'border-b dark:border-gray-600 dark:text-gray-100' }}">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-4 h-4">
                <path d="M19 21l-7-5-7 5V5a2 2 0 0 1 2-2h10a2 2 0 0 1 2 2z"></path>
            </svg>
            <span>Banifit Canculation</span>
        </a>
    </div>
    <div class="border-t border-gray-700 dark:border-gray-600 mt-2"></div> <!-- Side border -->
</div>