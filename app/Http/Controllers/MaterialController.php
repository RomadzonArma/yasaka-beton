<?php

namespace App\Http\Controllers;

use App\Models\Material;
use Illuminate\Http\Request;

class MaterialController extends Controller
{
    // Menampilkan daftar semua material
    public function index()
    {
        $materials = Material::with('supplier')->get();
        return response()->json([
            'message' => 'Successfully retrieved materials.',
            'data' => $materials
        ], 200);
    }

    // Menyimpan data material baru
    public function store(Request $request)
    {
        $request->validate([
            'material_name' => 'required|string|max:255',
            'quantity' => 'required|numeric',
            'unit' => 'required|string|max:50',
            'supplier_id' => 'required|exists:suppliers,id',
            'last_update' => 'nullable|date',
        ]);

        $material = Material::create($request->all());
        return response()->json([
            'message' => 'Successfully created material.',
            'data' => $material
        ], 201);
    }

    // Menampilkan data material berdasarkan ID
    public function show($id)
    {
        $material = Material::with('supplier')->findOrFail($id);
        return response()->json([
            'message' => 'Successfully retrieved material.',
            'data' => $material
        ], 200);
    }

    // Memperbarui data material
    public function update(Request $request, $id)
    {
        $request->validate([
            'material_name' => 'sometimes|required|string|max:255',
            'quantity' => 'sometimes|required|numeric',
            'unit' => 'sometimes|required|string|max:50',
            'supplier_id' => 'sometimes|required|exists:suppliers,id',
            'last_update' => 'sometimes|nullable|date',
        ]);

        $material = Material::findOrFail($id);
        $material->update($request->all());
        return response()->json([
            'message' => 'Successfully updated material.',
            'data' => $material
        ], 200);
    }

    // Menghapus data material
    public function destroy($id)
    {
        $material = Material::findOrFail($id);
        $material->delete();
        return response()->json([
            'message' => 'Successfully deleted material.'
        ], 200);
    }
}
