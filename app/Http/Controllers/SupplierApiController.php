<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Supplier;

class SupplierApiController extends Controller
{
    public function index()
    {
        $suppliers = Supplier::all();
        return response()->json(['data' => $suppliers]);
    }

    public function create()
    {
        // Implement as needed for your API, e.g., return a form structure for creating a Supplier.
    }

    public function store(Request $request)
    {
        $request->validate([
            'supplier' => 'required|string',
            'address' => 'required|string',
            'phone' => 'required|string',
        ]);

        $supplier = Supplier::create($request->all());

        return response()->json($supplier, 201); // Return the created resource with a 201 status code.
    }

    public function show($id)
    {
        $supplier = Supplier::find($id);

        if (!$supplier) {
            return response()->json(['message' => 'Supplier not found'], 404);
        }

        return response()->json($supplier);
    }

    public function edit($id)
    {
        // Implement as needed for your API, e.g., return a form structure for editing a Supplier.
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'supplier' => 'required|string',
            'address' => 'required|string',
            'phone' => 'required|string',
        ]);

        $supplier = Supplier::find($id);

        if (!$supplier) {
            return response()->json(['message' => 'Supplier not found'], 404);
        }

        $supplier->update($request->all());

        return response()->json($supplier);
    }

    public function destroy($id)
    {
        $supplier = Supplier::find($id);

        if (!$supplier) {
            return response()->json(['message' => 'Supplier not found'], 404);
        }

        $supplier->delete();

        return response()->json(['message' => 'Supplier deleted'], 204); // Return a 204 No Content status after deletion
    }}
