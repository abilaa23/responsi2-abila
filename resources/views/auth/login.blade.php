<x-guest-layout>
    <div class="w-full max-w-sm">
        <div class="text-center mb-8">
            <h1 class="text-3xl font-bold text-lilac-700">Sistem Stok Barang Dayla</h1>
            <p class="text-sm text-gray-500 mt-2">Silakan masuk ke akun Anda</p>
        </div>

        @if ($errors->any())
            <div class="mb-4 text-red-500 text-sm text-center">
                {{ $errors->first() }}
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}" class="space-y-5">
            @csrf

            <div>
                <label for="email" class="block text-sm text-lilac-700 mb-1">Email</label>
                <input id="email" name="email" type="email" value="{{ old('email') }}" required autofocus
                    class="w-full px-4 py-2 border border-lilac-300 bg-white rounded-md focus:ring-2 focus:ring-lilac-400 focus:outline-none" />
            </div>

            <div>
                <label for="password" class="block text-sm text-lilac-700 mb-1">Password</label>
                <input id="password" name="password" type="password" required
                    class="w-full px-4 py-2 border border-lilac-300 bg-white rounded-md focus:ring-2 focus:ring-lilac-400 focus:outline-none" />
            </div>

            <button type="submit"
                class="w-full bg-lilac-500 hover:bg-lilac-600 text-white py-2 rounded-md font-semibold transition duration-200">
                Masuk
            </button>
        </form>

        <div class="mt-6 text-center text-sm text-gray-600">
        </div>
    </div>
</x-guest-layout>
