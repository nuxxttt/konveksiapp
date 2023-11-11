<?php

namespace App\Http\Controllers;

use App\Models\Pemotongan;
use App\Models\Barang;
use App\Models\Satuan;
use App\Models\Konversi;
use Illuminate\Http\Request;

class PemotonganController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pemotongan = Konversi::all();
        $satuan = Satuan::all();
        return view('admin.pemotongan.index', compact('pemotongan', 'satuan'));
    }

    public function history()
    {
        $pemotongan = Pemotongan::all();
        $satuans = Satuan::all();
        return view('admin.pemotongan.history', compact('pemotongan', 'satuans'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'satuan_id1' => 'required',
            'hasil_id1' => 'required',
            'satuan_id2' => 'required',
            'hasil_id2' => 'required',
        ]);

        Pemotongan::create($request->all());
        // Redirect or do something else after storing the data
        return redirect()->back()->with('success', 'Berhasil Menambahkan data konversi.');    }

    /**
     * Display the specified resource.
     */
    public function show(Pemotongan $pemotongan)
    {
        //
    }

    public function edit($pemotongan)
    {
        $satuans = Satuan::all();
        $pemotongann = Konversi::where('id', $pemotongan)->first();
        return view('admin.pemotongan.edit', compact('pemotongann', 'satuans'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pemotongan $pemotongan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pemotongan $pemotongan)
    {
        //
    }
}
