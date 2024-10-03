<?php

namespace App\Http\Controllers;

use App\Models\Rental;
use Illuminate\Http\Request;

class RentalController extends Controller
{
     // Menampilkan daftar semua penyewaan
     public function index()
     {
         $rentals = Rental::with(['vehicle', 'equipment', 'customer'])->get();
         return response()->json([
             'message' => 'Successfully retrieved rentals.',
             'data' => $rentals
         ], 200);
     }

     // Menyimpan data penyewaan baru
     public function store(Request $request)
     {
         $request->validate([
             'customer_id' => 'required|exists:customers,id',
             'vehicle_id' => 'nullable|exists:vehicles,id',
             'equipment_id' => 'nullable|exists:equipment,id',
             'rental_date' => 'required|date',
             'return_date' => 'required|date|after:rental_date',
         ]);

         $rental = Rental::create($request->all());
         return response()->json([
             'message' => 'Successfully created rental.',
             'data' => $rental
         ], 201);
     }

     // Menampilkan data penyewaan berdasarkan ID
     public function show($id)
     {
         $rental = Rental::with(['vehicle', 'equipment', 'customer'])->findOrFail($id);
         return response()->json([
             'message' => 'Successfully retrieved rental.',
             'data' => $rental
         ], 200);
     }

     // Memperbarui data penyewaan
     public function update(Request $request, $id)
     {
         $request->validate([
             'customer_id' => 'sometimes|required|exists:customers,id',
             'vehicle_id' => 'sometimes|nullable|exists:vehicles,id',
             'equipment_id' => 'sometimes|nullable|exists:equipment,id',
             'rental_date' => 'sometimes|required|date',
             'return_date' => 'sometimes|required|date|after:rental_date',
         ]);

         $rental = Rental::findOrFail($id);
         $rental->update($request->all());
         return response()->json([
             'message' => 'Successfully updated rental.',
             'data' => $rental
         ], 200);
     }

     // Menghapus data penyewaan
     public function destroy($id)
     {
         $rental = Rental::findOrFail($id);
         $rental->delete();
         return response()->json([
             'message' => 'Successfully deleted rental.'
         ], 200);
     }
}
