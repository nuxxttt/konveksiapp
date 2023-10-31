<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mitra;
use Illuminate\Support\Facades\Log;

class MitraController extends Controller
{
    public function index()
    {
        $mitras = Mitra::all();
        return view('admin.mitra.index', compact('mitras'));
    }

    public function create()
    {
        return view('admin.mitra.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'phone' => 'required',
            'keterangan' => 'required',
        ]);

        Mitra::create($request->all());

        return redirect()->route('mitra.index')->with('success', 'Mitra created successfully.');
    }

    public function show($id)
    {
        $mitra = Mitra::find($id);
        return view('admin.mitra.show', compact('mitra'));
    }

    public function edit($id)
    {
        // Find the mitra by id
        $mitras = Mitra::find($id);

        // Pass the id and mitra variables to the view
        return view('admin.mitra.edit', compact('id', 'mitras'));
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required',
            'phone' => 'required',
            'keterangan' => 'required',
        ]);

        $mitra = Mitra::find($id);
        $mitra->update($request->all());

        return redirect()->route('mitra.index')->with('success', 'Mitra updated successfully.');
    }

    public function destroy($id)
    {
        $mitra = Mitra::find($id);
        $mitra->delete();

        return redirect()->route('mitra.index')->with('success', 'Mitra berhasil dihapus.');
    }

}
