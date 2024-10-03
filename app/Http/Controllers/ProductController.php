<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    // Menampilkan daftar semua produk
    public function index()
    {
        $products = Product::all();
        return response()->json([
            'message' => 'Successfully retrieved products.',
            'data' => $products
        ], 200);
    }

    // Menyimpan data produk baru
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price_per_unit' => 'required|numeric',
        ]);

        $product = Product::create($request->all());
        return response()->json([
            'message' => 'Successfully created product.',
            'data' => $product
        ], 201);
    }

    // Menampilkan data produk berdasarkan ID
    public function show($id)
    {
        $product = Product::findOrFail($id);
        return response()->json([
            'message' => 'Successfully retrieved product.',
            'data' => $product
        ], 200);
    }

    // Memperbarui data produk
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'sometimes|required|string|max:255',
            'description' => 'nullable|string',
            'price_per_unit' => 'sometimes|required|numeric',
        ]);

        $product = Product::findOrFail($id);
        $product->update($request->all());
        return response()->json([
            'message' => 'Successfully updated product.',
            'data' => $product
        ], 200);
    }

    // Menghapus data produk
    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();
        return response()->json([
            'message' => 'Successfully deleted product.'
        ], 200);
    }
}
