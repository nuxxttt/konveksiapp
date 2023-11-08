<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DistribusiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $distribusiData = Distribusi::all();
        return view('distribusi.index', compact('distribusiData'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'mitra_id' => 'required',
            'kode_barang' => 'required',
            'kuantitas' => 'required|numeric',
        ]);

        Distribusi::create($request->all());
        return redirect()->route('distribusi.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    public function edit($id)
    {
        $barang = Barang::find($id);
        return view('distribusi.edit', compact('barang'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Distribusi $distribusi)
    {
        $request->validate([
            'mitra_id' => 'required',
            'kode_barang' => 'required',
            'kuantitas' => 'required|numeric',
        ]);

        $distribusi->update($request->all());
        return redirect()->route('distribusi.index');    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $distribusi->delete();
        return redirect()->route('distribusi.index');
    }
}
