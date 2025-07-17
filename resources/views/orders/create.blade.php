<x-app-layout>
    <div class="max-w-2xl mx-auto p-6 bg-white shadow-md rounded-lg mt-10">
        <h2 class="text-2xl font-bold mb-6 text-lilac-700">Buat Pesanan</h2>

        <form action="{{ route('orders.store') }}" method="POST" class="space-y-5">
            @csrf

            <div>
                <label for="customer_id" class="block text-sm font-medium text-gray-700">Nama Pelanggan</label>
                <select name="customer_id" id="customer_id"
                    class="w-full px-4 py-2 border rounded-md @error('customer_id') border-red-500 @enderror">
                    <option value="">-- Pilih Pelanggan --</option>
                    @foreach ($customers as $customer)
                        <option value="{{ $customer->id }}" {{ old('customer_id') == $customer->id ? 'selected' : '' }}>
                            {{ $customer->name }}
                        </option>
                    @endforeach
                </select>
                @error('customer_id')
                    <p class="text-sm text-red-500 mt-1">Nama pelanggan wajib dipilih.</p>
                @enderror
            </div>

            <div>
                <label for="platform" class="block text-sm font-medium text-gray-700">Platform</label>
                <select name="platform" id="platform"
                    class="w-full px-4 py-2 border rounded-md @error('platform') border-red-500 @enderror">
                    <option value="">-- Pilih Platform --</option>
                    <option value="Shopee" {{ old('platform') == 'Shopee' ? 'selected' : '' }}>Shopee</option>
                    <option value="Tokopedia" {{ old('platform') == 'Tokopedia' ? 'selected' : '' }}>Tokopedia</option>
                    <option value="Offline" {{ old('platform') == 'Offline' ? 'selected' : '' }}>Offline</option>
                    <option value="Website" {{ old('platform') == 'Website' ? 'selected' : '' }}>Website</option>
                </select>
                @error('platform')
                    <p class="text-sm text-red-500 mt-1">Silakan pilih platform pemesanan.</p>
                @enderror
            </div>

            <div>
                <label for="product_id" class="block text-sm font-medium text-gray-700">Produk</label>
                <select name="product_id" id="product_id"
                    class="w-full px-4 py-2 border rounded-md @error('product_id') border-red-500 @enderror">
                    @foreach ($products as $product)
                        <option value="{{ $product->id }}"
                            {{ old('product_id') == $product->id ? 'selected' : '' }}>
                            {{ $product->name }}
                        </option>
                    @endforeach
                </select>
                @error('product_id')
                    <p class="text-sm text-red-500 mt-1">Produk wajib dipilih.</p>
                @enderror
            </div>

            <div>
                <label for="quantity" class="block text-sm font-medium text-gray-700">Jumlah</label>
                <input type="number" name="quantity" id="quantity" min="1"
                    class="w-full px-4 py-2 border rounded-md @error('quantity') border-red-500 @enderror"
                    value="{{ old('quantity') }}">
                @error('quantity')
                    <p class="text-sm text-red-500 mt-1">Jumlah minimal 1.</p>
                @enderror
            </div>

            <div class="flex justify-between">
                <a href="{{ route('orders.index') }}"
                    class="text-gray-600 hover:underline text-sm mt-2">← Kembali</a>

                <button type="submit"
                    class="bg-lilac-600 hover:bg-lilac-700 text-white font-semibold px-6 py-2 rounded-md">
                    Simpan
                </button>
            </div>
        </form>
    </div>
</x-app-layout>
