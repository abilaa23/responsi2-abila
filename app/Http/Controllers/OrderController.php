<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use App\Models\Customer;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $orders = Order::with('product', 'user', 'customer')->latest()->get();
        return view('orders.index', compact('orders'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $products = Product::all();
        $customers = Customer::all();

        return view('orders.create', compact('products', 'customers'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'customer_id' => 'required|exists:customers,id',
            'product_id'  => 'required|exists:products,id',
            'quantity'    => 'required|integer|min:1',
            'platform'    => 'required|string',
        ]);

        $product = Product::findOrFail($request->product_id);
        $totalPaid = $product->price * $request->quantity;

        $customer = Customer::findOrFail($request->customer_id);

        Order::create([
            'customer_id'   => $customer->id,
            'platform'      => $request->platform,
            'product_id'    => $request->product_id,
            'quantity'      => $request->quantity,
            'user_id'       => auth()->id(),
            'total_paid'    => $totalPaid,
        ]);

        return redirect()->route('orders.index')->with('success', 'Pesanan berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $order = Order::findOrFail($id);
        $products = Product::all();
        $customers = Customer::all();

        return view('orders.edit', compact('order', 'products', 'customers'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'product_id'   => 'required|exists:products,id',
            'quantity'     => 'required|integer|min:1',
            'customer_id'  => 'required|exists:customers,id',
            'platform'     => 'required|string',
        ]);

        $order = Order::findOrFail($id);
        $product = Product::findOrFail($request->product_id);
        $totalPaid = $product->price * $request->quantity;

        $order->update([
            'product_id'   => $request->product_id,
            'quantity'     => $request->quantity,
            'customer_id'  => $request->customer_id,
            'total_paid'   => $totalPaid,
            'platform'     => $request->platform,
        ]);

        return redirect()->route('orders.index')->with('success', 'Pesanan berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $order = Order::findOrFail($id);
        $order->delete();

        return redirect()->route('orders.index')->with('success', 'Pesanan berhasil dihapus.');
    }
}
