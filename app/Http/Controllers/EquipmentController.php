<?php

namespace App\Http\Controllers;

use App\Models\Equipment;
use Illuminate\Http\Request;

class EquipmentController extends Controller
{
     // Menampilkan daftar semua peralatan
     public function index()
     {
         $equipment = Equipment::all();
         return response()->json([
             'message' => 'Successfully retrieved equipment.',
             'data' => $equipment
         ], 200);
     }

     // Menyimpan data peralatan baru
     public function store(Request $request)
     {
         $request->validate([
             'name' => 'required|string|max:255',
             'description' => 'nullable|string',
             'price_per_day' => 'required|numeric',
             'availability' => 'required|boolean',
         ]);

         $equipment = Equipment::create($request->all());
         return response()->json([
             'message' => 'Successfully created equipment.',
             'data' => $equipment
         ], 201);
     }

     // Menampilkan data peralatan berdasarkan ID
     public function show($id)
     {
         $equipment = Equipment::findOrFail($id);
         return response()->json([
             'message' => 'Successfully retrieved equipment.',
             'data' => $equipment
         ], 200);
     }

     // Memperbarui data peralatan
     public function update(Request $request, $id)
     {
         $request->validate([
             'name' => 'sometimes|required|string|max:255',
             'description' => 'sometimes|nullable|string',
             'price_per_day' => 'sometimes|required|numeric',
             'availability' => 'sometimes|required|boolean',
         ]);

         $equipment = Equipment::findOrFail($id);
         $equipment->update($request->all());
         return response()->json([
             'message' => 'Successfully updated equipment.',
             'data' => $equipment
         ], 200);
     }

     // Menghapus data peralatan
     public function destroy($id)
     {
         $equipment = Equipment::findOrFail($id);
         $equipment->delete();
         return response()->json([
             'message' => 'Successfully deleted equipment.'
         ], 200);
     }
}
