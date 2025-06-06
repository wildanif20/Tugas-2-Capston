<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white-800 dark:text-red-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <!-- Card 1 -->
                <div class="bg-white dark:bg-red-800 overflow-hidden shadow rounded-lg border-2 border-white">
                    <div class="p-6">
                        <h3 class="text-lg font-semibold text-gray-900 dark:text-gray-100">Total Users</h3>
                        <p class="mt-2 text-3xl font-bold text-gray-800 dark:text-gray-200">123</p>
                    </div>
                </div>
                <!-- Card 2 -->
                <div class="bg-white dark:bg-red-800 overflow-hidden shadow rounded-lg border-2 border-white">
                    <div class="p-6">
                        <h3 class="text-lg font-semibold text-gray-900 dark:text-gray-100">Active Projects</h3>
                        <p class="mt-2 text-3xl font-bold text-gray-800 dark:text-gray-200">8</p>
                    </div>
                </div>
                <!-- Card 3 -->
                <div class="bg-white dark:bg-red-800 overflow-hidden shadow rounded-lg border-2 border-white">
                    <div class="p-6">
                        <h3 class="text-lg font-semibold text-gray-900 dark:text-gray-100">Tasks Completed</h3>
                        <p class="mt-2 text-3xl font-bold text-gray-800 dark:text-gray-200">56</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
