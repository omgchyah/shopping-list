<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
            {{ __('Edit Shopping List Item') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="container mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="w-full p-6 overflow-hidden bg-white shadow-sm dark:bg-gray-800 sm:rounded-lg">
            
            @if($item)
                <!-- Edit Form -->
                <form action="{{ route('shopping-list.updateItem', ['id' => $item->id]) }}" method="POST">
                    @csrf
                    @method('PATCH')

                    <table class="min-w-full text-gray-900 dark:text-gray-100">
                        <thead>
                            <tr>
                                <th class="px-4 py-2 text-left text-gray-900 border-b dark:text-gray-100">
                                    {{ __("Product") }}
                                </th>
                                <th class="px-4 py-2 text-right text-gray-900 border-b dark:text-gray-100">
                                    {{ __("Quantity") }}
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="hover:bg-gray-100 dark:hover:bg-gray-700">
                                <td class="px-4 py-2 text-left text-gray-900 border-b dark:text-gray-100">
                                    <!-- Product Name Input -->
                                    <input 
                                        type="text" 
                                        name="name" 
                                        value="{{ $item->name }}" 
                                        class="w-full p-2 border rounded-md dark:bg-gray-700 dark:text-gray-100"
                                        required>
                                </td>
                                <td class="px-4 py-2 text-right text-gray-900 border-b dark:text-gray-100">
                                    <!-- Quantity Input -->
                                    <input 
                                        type="number" 
                                        name="quantity" 
                                        value="{{ $item->quantity }}" 
                                        class="w-full p-2 text-right border rounded-md dark:bg-gray-700 dark:text-gray-100"
                                        required>
                                </td>
                            </tr>
                        </tbody>
                    </table>

                    <div class="flex justify-end mt-4">
                        <a href="{{ route('shopping-list') }}" class="px-4 py-2 mr-2 text-gray-800 bg-gray-300 rounded hover:bg-gray-400 dark:bg-gray-600 dark:text-gray-200 dark:hover:bg-gray-500">
                            {{ __('Cancel') }}
                        </a>
                        <button type="submit" class="px-4 py-2 text-white bg-blue-500 rounded hover:bg-blue-600">
                            {{ __('Save Changes') }}
                        </button>
                    </div>
                </form>
                
            @else
                <div class="flex justify-between p-6 text-gray-900 dark:text-gray-100">
                    <div class="mr-4">
                        {{ __("No item found") }}
                    </div>
                </div>
            @endif
            </div>
        </div>
    </div>
</x-app-layout>
