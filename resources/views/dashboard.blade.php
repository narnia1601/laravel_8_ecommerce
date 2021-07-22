<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="grid grid-cols-3 gap-4">
                        @foreach ($products as $product)
                            <div class="mb-10 m-2 shadow-lg border-gray-800 bg-gray-100 relative">
                                <img src="{{ Storage::url($product->image) }}" alt="" />
                                <div class="text-center py-2 bg-green-100">{{ $product->title }}</div>
                                <div class="text-center text-lg py-2">${{ $product->price }}</div>
                                <div class="text-center py-2">{{ $product->description }}</div>
                                <div class="flex justify-center text-center">
                                    <a href="{{ route('products.show', $product->title) }}" class="px-2 py-3 rounded bg-blue-500 my-3 w-11/12 text-white hover:bg-blue-600">Add to cart</a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
            {{ $products->links() }}
        </div>
    </div>
</x-app-layout>
