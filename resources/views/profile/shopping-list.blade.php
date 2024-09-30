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
                <table id="sortable-table" class="min-w-full text-gray-900 dark:text-gray-100">
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
                                <div>
                                    <a href="{{ route('shopping-list.editItem', ['id' => $item->id]) }}" class="text-blue-500 hover:text-blue-700">
                                        Edit
                                    </a>
                                </div>
                                <div>
                                    <form action="{{ route('shopping-list.deleteItem', ['id' => $item->id]) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-blue-500 hover:text-blue-700 delete-link">
                                            Delete
                                        </button>
                                    </form> 
                                </div>
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
                <form action="{{ route('shopping-list.createItem') }}" method="POST">
                    @csrf
                    <div class="flex justify-end mt-4">
                        <button type="submit" class="px-4 py-2 text-white bg-blue-500 rounded hover:bg-blue-600">
                            {{ __('Add Item') }}
                        </button>
                    </div>
                </form>                  

            </div>
        </div>
    </div>

    <script>
        // Wait until the page is fully loaded
        document.addEventListener('DOMContentLoaded', function() {
            // Select all the elements with the class 'delete-link'
            const deleteButtons = document.querySelectorAll('.delete-link');
    
            // Loop over each delete button
            deleteButtons.forEach(function(button) {
                // Add an event listener for the 'click' event
                button.addEventListener('click', function(event) {
                    // Show a confirmation dialog
                    if (!confirm('Are you sure you want to delete this item?')) {
                        // If the user cancels, prevent form submission
                        event.preventDefault();
                    }
                });
            });
        });
    </script>
    
</x-app-layout>
