<?php

namespace App\Http\Controllers;

use App\Models\Vehicle;
use Illuminate\Http\Request;

class VehicleController extends Controller
{
     // Menampilkan daftar semua kendaraan
     public function index()
     {
         $vehicles = Vehicle::all();
         return response()->json([
             'message' => 'Successfully retrieved vehicles.',
             'data' => $vehicles
         ], 200);
     }

     // Menyimpan data kendaraan baru
     public function store(Request $request)
     {
         $request->validate([
             'type' => 'required|string|max:255',
             'license_plate' => 'required|string|max:20',
             'brand' => 'required|string|max:255',
             'model' => 'nullable|string|max:255',
             'capacity' => 'required|numeric',
         ]);

         $vehicle = Vehicle::create($request->all());
         return response()->json([
             'message' => 'Successfully created vehicle.',
             'data' => $vehicle
         ], 201);
     }

     // Menampilkan data kendaraan berdasarkan ID
     public function show($id)
     {
         $vehicle = Vehicle::findOrFail($id);
         return response()->json([
             'message' => 'Successfully retrieved vehicle.',
             'data' => $vehicle
         ], 200);
     }

     // Memperbarui data kendaraan
     public function update(Request $request, $id)
     {
         $request->validate([
             'type' => 'sometimes|required|string|max:255',
             'license_plate' => 'sometimes|required|string|max:20',
             'brand' => 'sometimes|required|string|max:255',
             'model' => 'sometimes|nullable|string|max:255',
             'capacity' => 'sometimes|required|numeric',
         ]);

         $vehicle = Vehicle::findOrFail($id);
         $vehicle->update($request->all());
         return response()->json([
             'message' => 'Successfully updated vehicle.',
             'data' => $vehicle
         ], 200);
     }

     // Menghapus data kendaraan
     public function destroy($id)
     {
         $vehicle = Vehicle::findOrFail($id);
         $vehicle->delete();
         return response()->json([
             'message' => 'Successfully deleted vehicle.'
         ], 200);
     }
}
