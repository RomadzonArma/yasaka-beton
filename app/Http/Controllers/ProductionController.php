<?php

namespace App\Http\Controllers;

use App\Models\Production;
use Illuminate\Http\Request;

class ProductionController extends Controller
{
    // Menampilkan daftar semua produksi
    public function index()
    {
        $productions = Production::with(['product', 'supervisor'])->get();
        return response()->json([
            'message' => 'Successfully retrieved productions.',
            'data' => $productions
        ], 200);
    }

    // Menyimpan data produksi baru
    public function store(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'production_date' => 'required|date',
            'produced_volume' => 'required|numeric',
            'status' => 'required|string|max:50',
            'supervisor_id' => 'required|exists:employees,id',
        ]);

        $production = Production::create($request->all());
        return response()->json([
            'message' => 'Successfully created production.',
            'data' => $production
        ], 201);
    }

    // Menampilkan data produksi berdasarkan ID
    public function show($id)
    {
        $production = Production::with(['product', 'supervisor'])->findOrFail($id);
        return response()->json([
            'message' => 'Successfully retrieved production.',
            'data' => $production
        ], 200);
    }

    // Memperbarui data produksi
    public function update(Request $request, $id)
    {
        $request->validate([
            'product_id' => 'sometimes|required|exists:products,id',
            'production_date' => 'sometimes|required|date',
            'produced_volume' => 'sometimes|required|numeric',
            'status' => 'sometimes|required|string|max:50',
            'supervisor_id' => 'sometimes|required|exists:employees,id',
        ]);

        $production = Production::findOrFail($id);
        $production->update($request->all());
        return response()->json([
            'message' => 'Successfully updated production.',
            'data' => $production
        ], 200);
    }

    // Menghapus data produksi
    public function destroy($id)
    {
        $production = Production::findOrFail($id);
        $production->delete();
        return response()->json([
            'message' => 'Successfully deleted production.'
        ], 200);
    }
}
