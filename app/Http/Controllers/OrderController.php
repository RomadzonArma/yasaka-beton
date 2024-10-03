<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    // Menampilkan daftar semua pesanan
    public function index()
    {
        $orders = Order::with('customer')->get();
        return response()->json([
            'message' => 'Successfully retrieved orders.',
            'data' => $orders
        ], 200);
    }

    // Menyimpan data pesanan baru
    public function store(Request $request)
    {
        $request->validate([
            'order_number' => 'required|string|max:255',
            'customer_id' => 'required|exists:customers,id',
            'order_date' => 'required|date',
            'delivery_date' => 'required|date',
            'delivery_location' => 'required|string|max:255',
            'order_status' => 'required|string|max:50',
            'total_volume' => 'required|numeric',
            'price_per_unit' => 'required|numeric',
            'total_price' => 'required|numeric',
        ]);

        $order = Order::create($request->all());
        return response()->json([
            'message' => 'Successfully created order.',
            'data' => $order
        ], 201);
    }

    // Menampilkan data pesanan berdasarkan ID
    public function show($id)
    {
        $order = Order::with('customer')->findOrFail($id);
        return response()->json([
            'message' => 'Successfully retrieved order.',
            'data' => $order
        ], 200);
    }

    // Memperbarui data pesanan
    public function update(Request $request, $id)
    {
        $request->validate([
            'order_number' => 'sometimes|required|string|max:255',
            'customer_id' => 'sometimes|required|exists:customers,id',
            'order_date' => 'sometimes|required|date',
            'delivery_date' => 'sometimes|required|date',
            'delivery_location' => 'sometimes|required|string|max:255',
            'order_status' => 'sometimes|required|string|max:50',
            'total_volume' => 'sometimes|required|numeric',
            'price_per_unit' => 'sometimes|required|numeric',
            'total_price' => 'sometimes|required|numeric',
        ]);

        $order = Order::findOrFail($id);
        $order->update($request->all());
        return response()->json([
            'message' => 'Successfully updated order.',
            'data' => $order
        ], 200);
    }

    // Menghapus data pesanan
    public function destroy($id)
    {
        $order = Order::findOrFail($id);
        $order->delete();
        return response()->json([
            'message' => 'Successfully deleted order.'
        ], 200);
    }
}
