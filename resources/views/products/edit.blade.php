<x-app-layout>
    <div class="max-w-2xl mx-auto p-6 bg-white shadow-md rounded-lg mt-10">
        <h2 class="text-2xl font-bold mb-6 text-lilac-700">Edit Produk</h2>

        <form action="{{ route('products.update', $product->id) }}" method="POST" class="space-y-5">
            @csrf
            @method('PUT')

            <div>
                <label for="name" class="block text-sm font-medium text-gray-700">Nama Produk</label>
                <input type="text" name="name" id="name"
                    class="w-full px-4 py-2 border rounded-md @error('name') border-red-500 @enderror"
                    value="{{ old('name', $product->name) }}">
                @error('name')
                    <p class="text-sm text-red-500 mt-1">Nama produk wajib diisi!</p>
                @enderror
            </div>

            <div>
                <label for="description" class="block text-sm font-medium text-gray-700">Deskripsi</label>
                <textarea name="description" id="description" rows="3"
                    class="w-full px-4 py-2 border rounded-md @error('description') border-red-500 @enderror">{{ old('description', $product->description) }}</textarea>
                @error('description')
                    <p class="text-sm text-red-500 mt-1">Deskripsi wajib diisi!</p>
                @enderror
            </div>

            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label for="stock" class="block text-sm font-medium text-gray-700">Stok</label>
                    <input type="number" name="stock" id="stock"
                        class="w-full px-4 py-2 border rounded-md @error('stock') border-red-500 @enderror"
                        value="{{ old('stock', $product->stock) }}">
                    @error('stock')
                        <p class="text-sm text-red-500 mt-1">Stok minimal 0</p>
                    @enderror
                </div>

                <div>
                    <label for="price" class="block text-sm font-medium text-gray-700">Harga (Rp)</label>
                    <input type="number" step="0.01" name="price" id="price"
                        class="w-full px-4 py-2 border rounded-md @error('price') border-red-500 @enderror"
                        value="{{ old('price', $product->price) }}">
                    @error('price')
                        <p class="text-sm text-red-500 mt-1">Harga wajib diisi ! </p>
                    @enderror
                </div>
            </div>

            <div class="flex justify-between">
                <a href="{{ route('products.index') }}"
                    class="text-gray-600 hover:underline text-sm mt-2">← Kembali</a>

                <button type="submit"
                    class="bg-lilac-600 hover:bg-lilac-700 text-white font-semibold px-6 py-2 rounded-md">
                    Simpan
                </button>
            </div>
        </form>
    </div>
</x-app-layout>
