<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
            {{ __('My Shopping List') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="flex mx-auto justify-evenly max-w-7xl sm:px-6 lg:px-8">
            <div class="w-full overflow-hidden bg-white shadow-sm dark:bg-gray-800 sm:rounded-lg">
                <!-- Flex container with items side by side -->
                <div class="flex justify-between p-6 text-gray-900 dark:text-gray-100">
                    <div class="mr-4">
                        {{ __("Product") }}
                    </div>
                    <div>
                        {{ __("Quantity") }}
                    </div>
                </div>
            </div>
        </div>
    </div> 
</x-app-layout>
