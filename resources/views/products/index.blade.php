<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('All Products') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="px-20 mx-fixed">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <table class="table-fixed w-full text-center">
                        <thead>
                            <tr>
                                <th class="w-1/8">Title</th>
                                <th class="w-2/8">Description</th>
                                <th class="w-1/8">Price</th>
                                <th class="w-2/8">Image</th>
                                <th class="w-1/8">Edit</th>
                                <th class="w-1/8">Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($products as $product)
                                <tr>
                                    <td class="border-2 px-4 py-2">{{ $product->title }}</td>
                                    <td class="border-2 px-4 py-2">{{ $product->description }}</td>
                                    <td class="border-2 px-4 py-2">${{ $product->price }}</td>
                                    <td class="border-2 px-4 py-2"><img class="mx-auto" src="{{ Storage::url($product->image) }}" style="width: 120px; height: 120px;" alt=""></td>
                                    <td class="border-2 px-4 py-2"><a class="px-6 py-3 bg-yellow-500 text-white rounded shadow-lg" href="{{ route('products.edit', $product->title) }}">Edit</a></td>
                                    <td class="border-2 px-4 py-2">
                                        <form action="{{ route('products.delete', $product->title) }}" method="POST">
                                            @csrf
                                            <button class="px-6 py-3 bg-red-500 text-white rounded shadow-lg" type="submit">Delete</button>
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