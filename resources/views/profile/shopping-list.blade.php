<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
            {{ __('My Shopping List') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="container mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="w-full p-6 overflow-hidden bg-white shadow-sm dark:bg-gray-800 sm:rounded-lg">
            
            @if($shoppingList && $shoppingList->items->count() > 0)
            <!-- table -->
                <table class="min-w-full text-gray-900 dark:text-gray-100">
                    <thead>
                        <tr>
                            <th class="px-4 py-2 text-left text-gray-900 border-b dark:text-gray-100">
                                {{ __("Product") }}
                            </th>
                            <th class="px-4 py-2 text-right text-gray-900 border-b dark:text-gray-100">
                                {{ __("Quantity") }}
                            </th>
                            <th class="px-4 py-2 text-right text-gray-900 border-b dark:text-gray-100">
                                {{ __("Actions") }}
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($shoppingList->items as $item)
                        <tr class="hover:bg-gray-100 dark:hover:bg-gray-700">
                            <td class="px-4 py-2 text-left text-gray-900 border-b dark:text-gray-100">
                                {{ $item->name }}
                            </td>
                            <td class="px-4 py-2 text-right text-gray-900 border-b dark:text-gray-100">
                                {{ $item->quantity }}
                            </td>
                            <td class="px-4 py-2 text-right text-gray-900 border-b dark:text-gray-100">
                                <table>
                                <tr>
                                    <a href="{{ url('/shopping-list/' . $item->id . '/edit') }}" class="text-blue-500 hover:text-blue-700">
                                        Edit
                                    </a>
                                </tr>
                                <tr>
                                    <a href="{{ url('/shopping-list/' . $item->id . '/Delete') }}" class="text-blue-500 hover:text-blue-700">
                                        Delete
                                    </a>
                                </tr>
                                </table>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                </div>
                @else
                <div class="flex justify-between p-6 text-gray-900 dark:text-gray-100">
                    <div class="mr-4">
                        {{ __("No products") }}
                    </div>
                </div>
                @endif
                    

            </div>
        </div>
    </div> 
</x-app-layout>
