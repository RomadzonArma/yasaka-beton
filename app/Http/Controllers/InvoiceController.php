<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use Illuminate\Http\Request;

class InvoiceController extends Controller
{
    // Menampilkan daftar semua faktur
    public function index()
    {
        $invoices = Invoice::with('order')->get();
        return response()->json([
            'message' => 'Successfully retrieved invoices.',
            'data' => $invoices
        ], 200);
    }

    // Menyimpan data faktur baru
    public function store(Request $request)
    {
        $request->validate([
            'invoice_number' => 'required|string|max:255',
            'order_id' => 'required|exists:orders,id',
            'invoice_date' => 'required|date',
            'due_date' => 'required|date',
            'total_amount' => 'required|numeric',
            'payment_status' => 'required|string|max:50',
        ]);

        $invoice = Invoice::create($request->all());
        return response()->json([
            'message' => 'Successfully created invoice.',
            'data' => $invoice
        ], 201);
    }

    // Menampilkan data faktur berdasarkan ID
    public function show($id)
    {
        $invoice = Invoice::with('order')->findOrFail($id);
        return response()->json([
            'message' => 'Successfully retrieved invoice.',
            'data' => $invoice
        ], 200);
    }

    // Memperbarui data faktur
    public function update(Request $request, $id)
    {
        $request->validate([
            'invoice_number' => 'sometimes|required|string|max:255',
            'order_id' => 'sometimes|required|exists:orders,id',
            'invoice_date' => 'sometimes|required|date',
            'due_date' => 'sometimes|required|date',
            'total_amount' => 'sometimes|required|numeric',
            'payment_status' => 'sometimes|required|string|max:50',
        ]);

        $invoice = Invoice::findOrFail($id);
        $invoice->update($request->all());
        return response()->json([
            'message' => 'Successfully updated invoice.',
            'data' => $invoice
        ], 200);
    }

    // Menghapus data faktur
    public function destroy($id)
    {
        $invoice = Invoice::findOrFail($id);
        $invoice->delete();
        return response()->json([
            'message' => 'Successfully deleted invoice.'
        ], 200);
    }
}
