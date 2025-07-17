<x-app-layout>
    <div class="max-w-2xl mx-auto p-6 bg-white shadow-md rounded-lg mt-10">
        <h2 class="text-2xl font-bold mb-6 text-lilac-700">Edit Pelanggan</h2>

        <form action="{{ route('customers.update', $customer->id) }}" method="POST" class="space-y-5">
            @csrf
            @method('PUT')

            <div>
                <label for="name" class="block text-sm font-medium text-gray-700">Nama</label>
                <input type="text" name="name" id="name"
                    class="w-full px-4 py-2 border rounded-md @error('name') border-red-500 @enderror"
                    value="{{ old('name', $customer->name) }}">
                @error('name')
                    <p class="text-sm text-red-500 mt-1">Nama wajib diisi.</p>
                @enderror
            </div>

            <div>
                <label for="email" class="block text-sm font-medium text-gray-700">Email (opsional)</label>
                <input type="email" name="email" id="email"
                    class="w-full px-4 py-2 border rounded-md"
                    value="{{ old('email', $customer->email) }}">
            </div>

            <div>
                <label for="phone" class="block text-sm font-medium text-gray-700">No. Telepon</label>
                <input type="text" name="phone" id="phone"
                    class="w-full px-4 py-2 border rounded-md"
                    value="{{ old('phone', $customer->phone) }}">
            </div>

            <div>
                <label for="address" class="block text-sm font-medium text-gray-700">Alamat</label>
                <textarea name="address" id="address" rows="3"
                    class="w-full px-4 py-2 border rounded-md">{{ old('address', $customer->address) }}</textarea>
            </div>

            <div class="flex justify-between">
                <a href="{{ route('customers.index') }}"
                    class="text-gray-600 hover:underline text-sm mt-2">← Kembali</a>

                <button type="submit"
                    class="bg-lilac-600 hover:bg-lilac-700 text-white font-semibold px-6 py-2 rounded-md">
                    Perbarui
                </button>
            </div>
        </form>
    </div>
</x-app-layout>
