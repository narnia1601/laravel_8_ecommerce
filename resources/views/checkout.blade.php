<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Checkout') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="grid grid-cols-2 gap-4">
                        <form action="{{ route('shopping.payment') }}" method="post" id="payment-form">
                            @csrf
                            <div class="form-row">
                                <label for="card-holder-name">Enter name: </label>
                                <input id="card-holder-name" class="w-full px-4 py-2 bg-gray-200 rounded" type="text">
                                <label for="card-element">
                                Credit or debit card
                                </label>
                                <div id="card-element">
                                    
                                </div>

                                <!-- Used to display Element errors. -->
                                <div id="card-errors" role="alert"></div>
                            </div>

                            <button id="card-button">Process Payment</button>
                        </form>
                        <div>
                            <div class="mb-10 m-2 shadow-lg border-gray-800 bg-gray-100 p-4">
                                <div class="flex justify-between">
                                    <h1>Order total:</h1>
                                    <h1>Quantity:</h1>
                                </div>
                                @foreach (Cart::content() as $item)
                                    <div class="flex mt-4 justify-between">
                                        <p>{{ $item->name }}</p>
                                        <img src="{{ Storage::url($item->options->image) }}" height="100px" width="100px" alt="">
                                        <p>{{ $item->qty }}</p>
                                    </div>
                                @endforeach
                                <div class="flex justify-between mt-10">
                                    <h1>Subtotal:</h1>
                                    <p>${{ Cart::subtotal() }}</p>
                                </div>
                                <div class="flex justify-between mt-4">
                                    <h1>Tax:</h1>
                                    <p>${{ Cart::tax() }}</p>
                                </div>
                                <div class="flex justify-between mt-4">
                                    <h1>Total:</h1>
                                    <p>${{ Cart::total() }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
