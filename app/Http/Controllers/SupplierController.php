<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
      // Menampilkan daftar semua supplier
      public function index()
      {
          $suppliers = Supplier::all();
          return response()->json([
              'message' => 'Successfully retrieved suppliers.',
              'data' => $suppliers
          ], 200);
      }

      // Menyimpan data supplier baru
      public function store(Request $request)
      {
          $request->validate([
              'supplier_name' => 'required|string|max:255',
              'contact_person' => 'required|string|max:255',
              'phone' => 'required|string|max:15',
              'email' => 'nullable|email',
              'address' => 'nullable|string',
          ]);

          $supplier = Supplier::create($request->all());
          return response()->json([
              'message' => 'Successfully created supplier.',
              'data' => $supplier
          ], 201);
      }

      // Menampilkan data supplier berdasarkan ID
      public function show($id)
      {
          $supplier = Supplier::findOrFail($id);
          return response()->json([
              'message' => 'Successfully retrieved supplier.',
              'data' => $supplier
          ], 200);
      }

      // Memperbarui data supplier
      public function update(Request $request, $id)
      {
          $request->validate([
              'supplier_name' => 'sometimes|required|string|max:255',
              'contact_person' => 'sometimes|required|string|max:255',
              'phone' => 'sometimes|required|string|max:15',
              'email' => 'sometimes|nullable|email',
              'address' => 'sometimes|nullable|string',
          ]);

          $supplier = Supplier::findOrFail($id);
          $supplier->update($request->all());
          return response()->json([
              'message' => 'Successfully updated supplier.',
              'data' => $supplier
          ], 200);
      }

      // Menghapus data supplier
      public function destroy($id)
      {
          $supplier = Supplier::findOrFail($id);
          $supplier->delete();
          return response()->json([
              'message' => 'Successfully deleted supplier.'
          ], 200);
      }
}
