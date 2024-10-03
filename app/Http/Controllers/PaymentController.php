<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    // Menampilkan daftar semua pembayaran
    public function index()
    {
        $payments = Payment::with('invoice')->get();
        return response()->json([
            'message' => 'Successfully retrieved payments.',
            'data' => $payments
        ], 200);
    }

    // Menyimpan data pembayaran baru
    public function store(Request $request)
    {
        $request->validate([
            'invoice_id' => 'required|exists:invoices,id',
            'payment_date' => 'required|date',
            'amount_paid' => 'required|numeric',
            'payment_method' => 'required|string|max:50',
            'payment_status' => 'required|string|max:50',
        ]);

        $payment = Payment::create($request->all());
        return response()->json([
            'message' => 'Successfully created payment.',
            'data' => $payment
        ], 201);
    }

    // Menampilkan data pembayaran berdasarkan ID
    public function show($id)
    {
        $payment = Payment::with('invoice')->findOrFail($id);
        return response()->json([
            'message' => 'Successfully retrieved payment.',
            'data' => $payment
        ], 200);
    }

    // Memperbarui data pembayaran
    public function update(Request $request, $id)
    {
        $request->validate([
            'invoice_id' => 'sometimes|required|exists:invoices,id',
            'payment_date' => 'sometimes|required|date',
            'amount_paid' => 'sometimes|required|numeric',
            'payment_method' => 'sometimes|required|string|max:50',
            'payment_status' => 'sometimes|required|string|max:50',
        ]);

        $payment = Payment::findOrFail($id);
        $payment->update($request->all());
        return response()->json([
            'message' => 'Successfully updated payment.',
            'data' => $payment
        ], 200);
    }

    // Menghapus data pembayaran
    public function destroy($id)
    {
        $payment = Payment::findOrFail($id);
        $payment->delete();
        return response()->json([
            'message' => 'Successfully deleted payment.'
        ], 200);
    }
}
