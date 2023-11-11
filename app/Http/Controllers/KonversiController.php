<?php

namespace App\Http\Controllers;

use App\Models\Konversi;
use App\Models\Barang;
use App\Models\Satuan;
use Illuminate\Http\Request;

class KonversiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $konversi = Konversi::all();
        return view('admin.konversi.index', compact('konversi'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate the request data
        $request->validate([
            'nama_konversi' => 'required|string',
            'satuan_id1' => 'required|exists:satuan,id',
            'hasil_id1' => 'required|numeric',
            'satuan_id2' => 'required|exists:satuan,id',
            'hasil_id2' => 'required|numeric',
        ]);

        // Create a new Konversi instance
        $konversi = new Konversi();

        // Set the attributes from the form data
        $konversi->nama_konversi = $request->input('nama_konversi');
        $konversi->satuan_id1 = $request->input('satuan_id1');
        $konversi->hasil_id1 = $request->input('hasil_id1');
        $konversi->satuan_id2 = $request->input('satuan_id2');
        $konversi->hasil_id2 = $request->input('hasil_id2');

        // Save the Konversi instance to the database
        $konversi->save();

        // Redirect or do something else after storing the data
        return redirect()->back()->with('success', 'Berhasil Menambahkan data konversi.');
    }

    public function create(Request $request)
    {
        $konversi = Konversi::all();
        $satuan = Satuan::all();
        return view('admin.konversi.create', compact('konversi', 'satuan'));

    }
    public function edit(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Konversi $konversi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Konversi $konversi)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Konversi $konversi)
    {
        //
    }
}
