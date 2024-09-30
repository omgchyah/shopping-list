<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Shopping List</title>
        <script src="https://cdn.tailwindcss.com"></script>
        <script>
            tailwind.config = {
                theme: {
                    extend: {
                        fontFamily: {
                            courier: ['"Courier Prime"', 'monospace'],
                        }
                    }
                }
            }
        </script>
        <link href="https://fonts.cdnfonts.com/css/courier-prime" rel="stylesheet">
    </head>
    <body class="bg-gray-100">
        <div class="flex flex-col items-center min-h-screen pt-6 bg-gray-100 sm:justify-center sm:pt-0 dark:bg-gray-900">
            <div class="w-full px-6 py-4 mt-6 overflow-hidden bg-white shadow-md sm:max-w-md dark:bg-gray-800 sm:rounded-lg">
                <form action="{{ route('/shopping-list') }}" method="POST">
                    @csrf
                    <div class="mt-4">
                        <x-input-label for="name" :value="__('List Name')" />
                        <x-text-input id="name" name="name" type="text" class="block w-full mt-1" :value="old('name')" required autofocus autocomplete="name" />
                        <x-input-error class="mt-2" :messages="$errors->get('name')" />
                    </div>
                    <div class="flex justify-end mt-4">
                        <button type="submit" class="px-4 py-2 text-white bg-blue-500 rounded hover:bg-blue-600">
                            {{ __('Create List') }}
                        </button>
                    </div>
                </form>
            </div>
        </div>  