<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __($product->title) }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="px-20 mx-fixed">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200 grid grid-cols-2 gap-4">
                    <img class="shadow-2xl" src="{{ Storage::url($product->image) }}" alt="" />
                    <div class="bg-blue-100 h-max text-center">
                        <h1 class="p-4 text-xl">{{ $product->title }}</h1>
                        <p class="p-4">{{ $product->description}}</p>
                        <form action="{{ route('shopping.store') }}" method="POST">
                            @csrf
                            <label for="quantity">Quantity: </label>
                            <input class="mt-40" name="quantity" value="1" id="quantity" type="number">
                            <input type="hidden" name="product_id" value="{{ $product->id }}">
                            <button type="submit" class="px-2 py-3 rounded bg-blue-500 mt-10 text-white hover:bg-blue-600">Add to cart</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>