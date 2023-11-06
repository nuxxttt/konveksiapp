<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Supplier;
use Illuminate\Support\Facades\Log;

class SupplierController extends Controller
{
    public function index()
    {
        $suppliers = Supplier::all();
        return view('admin.supplier.index', compact('suppliers'));
    }

    public function create()
    {
        return view('admin.supplier.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'supplier' => 'required',
            'address' => 'required',
            'phone' => 'required',
        ]);

        Supplier::create($request->all());

        return redirect()->route('supplier.index')->with('success', 'Berhasil menambahkan data Supplier baru.');
    }

    public function show($id)
    {
        $supplier = Supplier::find($id);
        return view('admin.supplier.show', compact('supplier'));
    }

    public function edit($id)
    {
        $supplier = Supplier::find($id);
        return view('admin.supplier.edit', compact('supplier'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'supplier' => 'required',
            'address' => 'required',
            'phone' => 'required',
        ]);

        $supplier = Supplier::find($id);
        $supplier->update($request->all());

        return redirect()->route('supplier.index')->with('success', 'Data Supplier berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $supplier = Supplier::find($id);
        $supplier->delete();

        return redirect()->route('supplier.index')->with('success', 'Data Supplier berhasil dihapus');
    }

}
