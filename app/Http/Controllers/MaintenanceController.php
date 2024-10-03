<?php

namespace App\Http\Controllers;

use App\Models\Maintenance;
use Illuminate\Http\Request;

class MaintenanceController extends Controller
{
    // Menampilkan daftar semua pemeliharaan
    public function index()
    {
        $maintenanceRecords = Maintenance::with(['vehicle', 'equipment'])->get();
        return response()->json([
            'message' => 'Successfully retrieved maintenance records.',
            'data' => $maintenanceRecords
        ], 200);
    }

    // Menyimpan data pemeliharaan baru
    public function store(Request $request)
    {
        $request->validate([
            'vehicle_id' => 'nullable|exists:vehicles,id',
            'equipment_id' => 'nullable|exists:equipment,id',
            'maintenance_date' => 'required|date',
            'description' => 'nullable|string',
            'cost' => 'nullable|numeric',
        ]);

        $maintenance = Maintenance::create($request->all());
        return response()->json([
            'message' => 'Successfully created maintenance record.',
            'data' => $maintenance
        ], 201);
    }

    // Menampilkan data pemeliharaan berdasarkan ID
    public function show($id)
    {
        $maintenance = Maintenance::with(['vehicle', 'equipment'])->findOrFail($id);
        return response()->json([
            'message' => 'Successfully retrieved maintenance record.',
            'data' => $maintenance
        ], 200);
    }

    // Memperbarui data pemeliharaan
    public function update(Request $request, $id)
    {
        $request->validate([
            'vehicle_id' => 'sometimes|nullable|exists:vehicles,id',
            'equipment_id' => 'sometimes|nullable|exists:equipment,id',
            'maintenance_date' => 'sometimes|required|date',
            'description' => 'sometimes|nullable|string',
            'cost' => 'sometimes|nullable|numeric',
        ]);

        $maintenance = Maintenance::findOrFail($id);
        $maintenance->update($request->all());
        return response()->json([
            'message' => 'Successfully updated maintenance record.',
            'data' => $maintenance
        ], 200);
    }

    // Menghapus data pemeliharaan
    public function destroy($id)
    {
        $maintenance = Maintenance::findOrFail($id);
        $maintenance->delete();
        return response()->json([
            'message' => 'Successfully deleted maintenance record.'
        ], 200);
    }
}
