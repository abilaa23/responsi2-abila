<x-app-layout>
    <div class="max-w-7xl mx-auto p-6 bg-white shadow-md rounded-lg mt-10">
        <h2 class="text-2xl font-bold mb-6 text-lilac-700">Daftar Pelanggan</h2>

        @if (session('success'))
            <div class="mb-4 text-green-600 font-semibold">
                {{ session('success') }}
            </div>
        @endif

        <div class="mb-4">
            <a href="{{ route('customers.create') }}"
               class="bg-lilac-600 hover:bg-lilac-700 text-white px-4 py-2 rounded-md text-sm font-medium">
                + Tambah Pelanggan
            </a>
        </div>

        <table class="min-w-full border divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase">Nama</th>
                    <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase">Email</th>
                    <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase">No. Telepon</th>
                    <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase">Alamat</th>
                    <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase">Aksi</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @if ($customers->count())
                    @foreach ($customers as $customer)
                        <tr>
                            <td class="px-4 py-2">{{ $customer->name }}</td>
                            <td class="px-4 py-2">{{ $customer->email ?? '-' }}</td>
                            <td class="px-4 py-2">{{ $customer->phone ?? '-' }}</td>
                            <td class="px-4 py-2">{{ $customer->address ?? '-' }}</td>
                            <td class="px-4 py-2">
                                <a href="{{ route('customers.edit', $customer->id) }}"
                                   class="text-indigo-600 hover:underline text-sm">Edit</a>
                                <form action="{{ route('customers.destroy', $customer->id) }}" method="POST"
                                      class="inline-block ml-2"
                                      onsubmit="return confirm('Yakin ingin menghapus pelanggan ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                            class="text-red-600 hover:underline text-sm">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="5" class="px-4 py-4 text-center text-gray-500">
                            Tidak ada data pelanggan.
                        </td>
                    </tr>
                @endif
            </tbody>
        </table>
    </div>
</x-app-layout>
