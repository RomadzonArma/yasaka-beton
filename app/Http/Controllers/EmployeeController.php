<?php
namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class EmployeeController extends Controller
{
    public function index()
    {
        return response()->json(Employee::all(), 200);
    }

    // Menyimpan data karyawan baru
    public function store(Request $request)
    {
        $request->validate([
            'employee_name' => 'required|string|max:255',
            'role' => 'required|string|max:255',
            'phone' => 'required|string|max:15',
            'address' => 'nullable|string|max:255',
            'salary' => 'required|numeric',
        ]);

        $employee = Employee::create($request->all());

        return response()->json([
            'message' => 'Successfully created employee.',
            'data' => $employee
        ], 201);
    }

    // Menampilkan data karyawan berdasarkan ID
    public function show($id)
    {
        $employee = Employee::findOrFail($id);
        return response()->json($employee, 200);
    }

    // Memperbarui data karyawan
    public function update(Request $request, $id)
    {
        $employee = Employee::findOrFail($id);
        $employee->update($request->all());

        return response()->json([
            'message' => 'Successfully updated employee.',
            'data' => $employee
        ], 200);
    }

    // Menghapus data karyawan
    public function destroy($id)
    {
        Employee::destroy($id);

        return response()->json([
            'message' => 'Successfully deleted employee.'
        ], 204);
    }
}
