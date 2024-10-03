<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function index(){
        return Customer::all();
    }

    public function store(Request $request){
        $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:13',
            'email' => 'required|string|max:100',
            'address' => 'nullable|string|max:255',
        ]);
        $customer = Customer::create($request->all());
        return response()->json(['message' => 'Successfuly created customer', 'data' => $customer], 201);
    }

    public function show($id)
    {
        $customer = Customer::findOrFail($id);
        return response()->json($customer, 200);
    }

    // Memperbarui data karyawan
    public function update(Request $request, $id)
    {
        $customer = Customer::findOrFail($id);
        $customer->update($request->all());

        return response()->json([
            'message' => 'Successfully updated customer.',
            'data' => $customer
        ], 200);
    }

    // Menghapus data karyawan
    public function destroy($id)
    {
        Customer::destroy($id);

        return response()->json([
            'message' => 'Successfully deleted customer.'
        ], 204);
    }
}
