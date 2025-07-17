<x-app-layout>
    <div class="max-w-2xl mx-auto p-6 bg-white shadow-md rounded-lg mt-10">
        <h2 class="text-2xl font-bold mb-6 text-lilac-700">Tambah Pelanggan</h2>

        <form action="{{ route('customers.store') }}" method="POST" class="space-y-5">
            @csrf

            <div>
                <label for="name" class="block text-sm font-medium text-gray-700">Nama</label>
                <input type="text" name="name" id="name"
                    class="w-full px-4 py-2 border rounded-md @error('name') border-red-500 @enderror"
                    value="{{ old('name') }}">
                @error('name')
                    <p class="text-sm text-red-500 mt-1">Nama wajib diisi.</p>
                @enderror
            </div>

            <div>
                <label for="email" class="block text-sm font-medium text-gray-700">Email (opsional)</label>
                <input type="email" name="email" id="email"
                    class="w-full px-4 py-2 border rounded-md @error('email') border-red-500 @enderror"
                    value="{{ old('email') }}">
            </div>

            <div>
                <label for="phone" class="block text-sm font-medium text-gray-700">No. Telepon</label>
                <input type="text" name="phone" id="phone"
                    class="w-full px-4 py-2 border rounded-md @error('phone') border-red-500 @enderror"
                    value="{{ old('phone') }}">
            </div>

            <div>
                <label for="address" class="block text-sm font-medium text-gray-700">Alamat</label>
                <textarea name="address" id="address" rows="3"
                    class="w-full px-4 py-2 border rounded-md @error('address') border-red-500 @enderror">{{ old('address') }}</textarea>
            </div>

            <div class="flex justify-between">
                <a href="{{ route('customers.index') }}"
                    class="text-gray-600 hover:underline text-sm mt-2">← Kembali</a>

                <button type="submit"
                    class="bg-lilac-600 hover:bg-lilac-700 text-white font-semibold px-6 py-2 rounded-md">
                    Simpan
                </button>
            </div>
        </form>
    </div>
</x-app-layout>
