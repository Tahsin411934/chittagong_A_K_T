<x-app-layout>
    <div class="bg-gray-100 dark:bg-gray-900 min-h-screen"> <!-- Background for both modes -->
        <div class="grid grid-cols-11 gap-4">
            <div class="col-span-2">
                @include('user.sidebar.sidebar')
            </div>

            <div class="p-4 text-gray-900 dark:text-gray-200 col-span-9"> <!-- Text color for both modes -->
                <!-- Your main content goes here -->
                <h1 class="text-2xl font-bold">Welcome to Your Dashboard</h1>
                <p class="mt-2">This is your main content area.</p>
            </div>
        </div>
    </div>
</x-app-layout>
