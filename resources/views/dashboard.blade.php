<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-10">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-800">
                    <h3 class="text-2xl font-bold mb-4">Selamat datang, {{ Auth::user()->name }}!</h3>

                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                        <div class="bg-blue-100 p-4 rounded shadow">
                            <h4 class="text-lg font-semibold">Total Produk</h4>
                            <p class="text-2xl">{{ \App\Models\Product::count() }}</p>
                        </div>
                        <div class="bg-green-100 p-4 rounded shadow">
                            <h4 class="text-lg font-semibold">Total Order</h4>
                            <p class="text-2xl">{{ \App\Models\Order::count() }}</p>
                        </div>
                        <div class="bg-yellow-100 p-4 rounded shadow">
                            <h4 class="text-lg font-semibold">Total Pelanggan</h4>
                            <p class="text-2xl">{{ \App\Models\Order::distinct('customer_name')->count('customer_name') }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
