<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ Cart::count() }} items in cart
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <table class="table-fixed w-full text-center">
                        <thead>
                            <tr>
                                <th class="w-2/8">Product name</th>
                                <th class="w-2/8">Price</th>                                
                                <th class="w-2/8">Product quantity</th>                                                              
                                {{-- <th class="w-3/8">Image</th> --}}
                                <th class="w-2/8">Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach (Cart::content() as $product)
                                <tr>
                                    <td class="px-4 py-8">{{ $product->name }}</td>
                                    <td class="px-4 py-8">${{ $product->price }}</td>
                                    <td class="px-4 py-8">
                                        <form action="{{ route('shopping.update', $product->rowId) }}" method="POST">
                                            @csrf
                                            <input type="number" name="quantity" class="w-20 @error('quantity') border-red-500 @enderror" value="{{ $product->qty }}">
                                            <button class="px-4 py-3 bg-yellow-500 text-white rounded shadow-lg" type="submit">Update quantity</button>
                                        </form>
                                        @error('quantity')
                                                <div class="text-red-500">{{ $message }}</div>
                                        @enderror
                                    </td>
                                    {{-- <td class="border-2 px-4 py-2"><img class="mx-auto" src="{{ Storage::url($product->image) }}" style="width: 120px; height: 120px;" alt=""></td> --}}
                                    <td class="px-4 py-2">
                                        <form action="{{ route('shopping.destroy', $product->rowId) }}" method="POST">
                                            @csrf
                                            <button class="px-4 py-3 bg-red-500 text-white rounded shadow-lg" type="submit">Remove item from cart</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="flex justify-between px-24 mt-10">
                        <div>Tax:</div>
                        <div>${{ Cart::tax() }}</div>
                    </div>
                    <div class="flex justify-between px-24 mt-10">
                        <div>Total:</div>
                        <div>${{ Cart::total() }}</div>
                    </div>
                    <div class="flex justify-between px-24 mt-10 mb-10">
                        <div></div>
                        <div><a href="{{ route('shopping.checkout') }}" class="bg-green-100 px-6 py-4 hover:bg-green-300">Checkout</a></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
