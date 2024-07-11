<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Favorite') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __("You're logged in!") }}
                </div>

                <div class="p-6 bg-white dark:bg-gray-800">
                    <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                        <thead>
                            <tr>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider dark:text-gray-400">
                                    Product
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider dark:text-gray-400">
                                    Quantity
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider dark:text-gray-400">
                                    Price
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider dark:text-gray-400">
                                    Action
                                </th>
                            </tr>
                        </thead>
                        <tbody class="bg-white dark:bg-gray-800 divide-y divide-gray-200 dark:divide-gray-700">
                            @foreach ($favorites as $favorite)
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900 dark:text-gray-100">
                                    {{ $favorite->product->name }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-gray-400">
                                    <form method="POST" action="{{ route('favorites.update', $favorite->id) }}">
                                        @csrf
                                        @method('PATCH')
                                        <div class="flex items-center">
                                            <button type="button" class="px-2 py-1 text-gray-600 dark:text-gray-300" onclick="decrementQuantity({{ $favorite->id }})">-</button>
                                            <input id="quantity-{{ $favorite->id }}" name="quantity" type="text" value="{{ $favorite->quantity }}" class="w-12 text-center border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-300">
                                            <button type="button" class="px-2 py-1 text-gray-600 dark:text-gray-300" onclick="incrementQuantity({{ $favorite->id }})">+</button>
                                        </div>
                                    </form>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-gray-400">
                                    ${{ number_format($favorite->product->price, 2) }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                    <form method="POST" action="{{ route('favorites.destroy', $favorite->id) }}">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-600 dark:text-red-400 hover:text-red-900 dark:hover:text-red-300">Delete</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

<script>
    function incrementQuantity(id) {
        let quantityInput = document.getElementById('quantity-' + id);
        let quantity = parseInt(quantityInput.value);
        quantityInput.value = quantity + 1;
    }

    function decrementQuantity(id) {
        let quantityInput = document.getElementById('quantity-' + id);
        let quantity = parseInt(quantityInput.value);
        if (quantity > 1) {
            quantityInput.value = quantity - 1;
        }
    }
</script>
