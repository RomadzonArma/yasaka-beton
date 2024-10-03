<?php

namespace App\Http\Controllers;

use App\Models\Delivery;
use Illuminate\Http\Request;

class DeliveryController extends Controller
{
    // Menampilkan daftar semua pengiriman
    public function index()
    {
        $deliveries = Delivery::with('order')->get();
        return response()->json([
            'message' => 'Successfully retrieved deliveries.',
            'data' => $deliveries
        ], 200);
    }

    // Menyimpan data pengiriman baru
    public function store(Request $request)
    {
        $request->validate([
            'order_id' => 'required|exists:orders,id',
            'delivery_date' => 'required|date',
            'vehicle_number' => 'required|string|max:255',
            'driver_name' => 'required|string|max:255',
            'delivery_status' => 'required|string|max:50',
        ]);

        $delivery = Delivery::create($request->all());
        return response()->json([
            'message' => 'Successfully created delivery.',
            'data' => $delivery
        ], 201);
    }

    // Menampilkan data pengiriman berdasarkan ID
    public function show($id)
    {
        $delivery = Delivery::with('order')->findOrFail($id);
        return response()->json([
            'message' => 'Successfully retrieved delivery.',
            'data' => $delivery
        ], 200);
    }

    // Memperbarui data pengiriman
    public function update(Request $request, $id)
    {
        $request->validate([
            'order_id' => 'sometimes|required|exists:orders,id',
            'delivery_date' => 'sometimes|required|date',
            'vehicle_number' => 'sometimes|required|string|max:255',
            'driver_name' => 'sometimes|required|string|max:255',
            'delivery_status' => 'sometimes|required|string|max:50',
        ]);

        $delivery = Delivery::findOrFail($id);
        $delivery->update($request->all());
        return response()->json([
            'message' => 'Successfully updated delivery.',
            'data' => $delivery
        ], 200);
    }

    // Menghapus data pengiriman
    public function destroy($id)
    {
        $delivery = Delivery::findOrFail($id);
        $delivery->delete();
        return response()->json([
            'message' => 'Successfully deleted delivery.'
        ], 200);
    }
}
