<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('New Product') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form method="POST" action="{{ route('products.store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="flex justify-between items-center">
                            <label for="title">Title</label>
                            <div class="w-10/12">
                                <input type="text" class="w-full px-4 py-3 bg-gray-200 rounded @error('title') border-red-500 @enderror" placeholder="Enter new product title" id="title" name="title" value="{{ old('title') }}">
                                @error('title')
                                    <div class="text-red-500">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="flex justify-between items-center mt-4">
                            <label for="description">Description</label>
                            <div class="w-10/12">
                                <textarea name="description" class="w-full bg-gray-200 @error('description') border-red-500 @enderror" id="description" rows="5" placeholder="Enter new product description">{{ old('description') }}</textarea>
                                @error('description')
                                    <div class="text-red-500">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="flex justify-between items-center">
                            <label for="price">Price</label>
                            <div class="w-10/12">
                                <input type="number" class="w-full px-4 py-3 bg-gray-200 rounded @error('price') border-red-500 @enderror" placeholder="Enter new product price" id="price" name="price" value="{{ old('price') }}">
                                @error('price')
                                    <div class="text-red-500">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="flex justify-between items-center mt-4">
                            <label for="image">Image File</label>
                            <div class="w-10/12">
                                <input type="file" class="w-full @error('description') text-red-500 @enderror" id="image" name="image">
                                @error('image')
                                    <div class="text-red-500">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="mt-4">
                        <button class="px-4 py-1 text-white font-light tracking-wider bg-gray-900 rounded" type="submit">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
