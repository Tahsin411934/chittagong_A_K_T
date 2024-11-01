<div>
    <button id="theme-toggle" class="focus:outline-none">
        <!-- Light Mode Icon -->
        <svg id="light-icon" xmlns="http://www.w3.org/2000/svg" class="h-7 w-7 hidden text-gray-300 dark:block" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <circle cx="12" cy="12" r="5"></circle>
            <line x1="12" y1="1" x2="12" y2="3"></line>
            <line x1="12" y1="21" x2="12" y2="23"></line>
            <line x1="4.22" y1="4.22" x2="5.64" y2="5.64"></line>
            <line x1="18.36" y1="18.36" x2="19.78" y2="19.78"></line>
            <line x1="1" y1="12" x2="3" y2="12"></line>
            <line x1="21" y1="12" x2="23" y2="12"></line>
            <line x1="4.22" y1="19.78" x2="5.64" y2="18.36"></line>
            <line x1="18.36" y1="5.64" x2="19.78" y2="4.22"></line>
        </svg>

        <!-- Dark Mode Icon -->
        <svg id="dark-icon" xmlns="http://www.w3.org/2000/svg" class="h-7 w-7 dark:hidden text-gray-500" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <path d="M21 12.79A9 9 0 1 1 11.21 3a7 7 0 0 0 9.79 9.79z"></path>
        </svg>
    </button>
</div>

<script>
    // Get the current theme from localStorage or default to 'light'
    const currentTheme = localStorage.getItem('theme') || 'light';

    // Apply the saved theme and set icon visibility
    function applyTheme(theme) {
        if (theme === 'dark') {
            document.documentElement.classList.add('dark');
            document.getElementById('light-icon').classList.add('hidden');
            document.getElementById('dark-icon').classList.remove('hidden');
        } else {
            document.documentElement.classList.remove('dark');
            document.getElementById('light-icon').classList.remove('hidden');
            document.getElementById('dark-icon').classList.add('hidden');
        }
    }

    applyTheme(currentTheme); // Apply the initial theme

    // Handle the theme toggle button click
    document.getElementById('theme-toggle').addEventListener('click', function() {
        const isDarkMode = document.documentElement.classList.contains('dark');

        if (isDarkMode) {
            applyTheme('light');
            localStorage.setItem('theme', 'light');
        } else {
            applyTheme('dark');
            localStorage.setItem('theme', 'dark');
        }
    });
</script>
