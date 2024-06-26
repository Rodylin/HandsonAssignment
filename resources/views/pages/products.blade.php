@extends('templates.base')

@section('content')
    @if (session('message'))
        <div class="bg-green-500 text-white p-4 mb-4">
            {{ session('message') }}
        </div>
    @endif

    <div class="container mx-auto p-4">
        <h1 class="text-4xl mb-4">Products</h1>
        
        <div class="mb-4">
            <button id="add-product-btn" class="bg-blue-500 text-white px-4 py-2 rounded">Add</button>
        </div>

        <div id="product-form" class="hidden mb-4">
            <form action="{{ route('save.product') }}" method="POST" id="product-form">
                @csrf
                <div class="mb-4">
                    <label for="name" class="block text-gray-700">Name</label>
                    <input type="text" name="name" id="name" class="w-full px-4 py-2 border rounded">
                    <span id="name-error" class="text-red-500 hidden">Name is required.</span>
                </div>
                <div class="mb-4">
                    <label for="desc" class="block text-gray-700">Description</label>
                    <textarea name="desc" id="desc" class="w-full px-4 py-2 border rounded"></textarea>
                    <span id="desc-error" class="text-red-500 hidden">Description is required.</span>
                </div>
                <div class="mb-4">
                    <label for="price" class="block text-gray-700">Price</label>
                    <input type="text" name="price" id="price" class="w-full px-4 py-2 border rounded">
                    <span id="price-error" class="text-red-500 hidden">Price is required.</span>
                </div>
                <div class="mb-4">
                    <label for="quantity" class="block text-gray-700">Quantity</label>
                    <input type="number" name="quantity" id="quantity" class="w-full px-4 py-2 border rounded" min="0">
                    <span id="quantity-error" class="text-red-500 hidden">Quantity is required.</span>
                </div>
                <div class="flex items-center justify-between">
                    <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded">Save</button>
                    <button type="button" id="close-product-form" class="bg-red-500 text-white px-4 py-2 rounded">Close</button>
                </div>
            </form>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
            <!-- Fetch products from the database -->
            @php
                $products = \App\Models\Product::all();
            @endphp

            @foreach ($products as $product)
                <div class="border p-4 rounded">
                    <h2 class="text-2xl">{{ $product->name }}</h2>
                    <p>{{ $product->desc }}</p>
                    <p><strong>Price:</strong> ${{ $product->price }}</p>
                    <p><strong>Quantity:</strong> {{ $product->quantity }}</p>
                </div>
            @endforeach
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            document.getElementById('add-product-btn').addEventListener('click', function () {
                document.getElementById('product-form').classList.remove('hidden');
            });

            document.getElementById('close-product-form').addEventListener('click', function () {
                document.getElementById('product-form').classList.add('hidden');
            });

            document.getElementById('product-form').addEventListener('submit', function (event) {
                // Reset previous error messages
                document.getElementById('name-error').classList.add('hidden');
                document.getElementById('desc-error').classList.add('hidden');
                document.getElementById('price-error').classList.add('hidden');
                document.getElementById('quantity-error').classList.add('hidden');

                // Get form input values
                var name = document.getElementById('name').value.trim();
                var desc = document.getElementById('desc').value.trim();
                var price = document.getElementById('price').value.trim();
                var quantity = document.getElementById('quantity').value.trim();

                // Check if any field is empty
                var hasError = false;

                if (name === '') {
                    document.getElementById('name-error').classList.remove('hidden');
                    hasError = true;
                }

                if (desc === '') {
                    document.getElementById('desc-error').classList.remove('hidden');
                    hasError = true;
                }

                if (price === '') {
                    document.getElementById('price-error').classList.remove('hidden');
                    hasError = true;
                }

                if (quantity === '') {
                    document.getElementById('quantity-error').classList.remove('hidden');
                    hasError = true;
                }

                if (hasError) {
                    event.preventDefault(); // Prevent form submission
                    return false;
                }
            });
        });
    </script>
@endsection
