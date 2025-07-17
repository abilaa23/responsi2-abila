<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Dashboard
        </h2>
    </x-slot>

    <div class="py-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    <!-- Total Produk -->
                    <div class="bg-blue-100 p-4 rounded shadow">
                        <h4 class="text-lg font-semibold">Total Produk</h4>
                        <p class="text-2xl">{{ \App\Models\Product::count() }}</p>
                    </div>

                    <!-- Total Order -->
                    <div class="bg-green-100 p-4 rounded shadow">
                        <h4 class="text-lg font-semibold">Total Order</h4>
                        <p class="text-2xl">{{ \App\Models\Order::count() }}</p>
                    </div>

                    <!-- Total Pelanggan -->
                    <div class="bg-yellow-100 p-4 rounded shadow">
                        <h4 class="text-lg font-semibold">Total Pelanggan</h4>
                        <p class="text-2xl">
                            {{ \App\Models\Customer::count() }}
                            {{-- {{ \App\Models\Order::distinct('customer_id')->count('customer_id') }} --}}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
