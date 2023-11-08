<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\IsiRak;
use App\Models\Barang;
use App\Models\Satuan;
use Illuminate\Support\Facades\Log;

class IsiRakController extends Controller
{
    public function index(Request $request)
    {
        $isiraks = IsiRak::all();
        $id_rak = $request->input('id_rak');
        $barang = Barang::all();
        $satuan = Satuan::all();

        return view('admin.isirak.index', compact('isiraks', 'id_rak', 'barang', 'satuan'));
    }

    public function create(Request $request)
    {
        $id_rak = $request->input('id_rak');
        $barang = Barang::all();
        $satuan = Satuan::all();
        return view('admin.isirak.create', compact('id_rak', 'barang', 'satuan'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_rak' => 'required',
            'nama_barang' => 'required',
            'kuantitas' => 'required',
            'satuan' => 'required',
        ]);
        $id_rak = $request->input('id_rak');


        IsiRak::create($request->all());

        return redirect()->route('isirak.index', ['id_rak' => $id_rak])->with('success', 'Berhasil menambahkan barang kedalam Rak.');
    }

    public function show($id)
    {
        $isirak = IsiRak::find($id);
        return view('admin.isirak.show', compact('isirak'));
    }

    public function edit(Request $request, $id)
    {
        $isirak = IsiRak::find($id);
        $id_rak = $request->input('id_rak');
        $barang = Barang::all();
        $satuan = Satuan::all();
        return view('admin.isirak.edit', compact('isirak', 'id_rak', 'barang', 'satuan'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'id_rak' => 'required',
            'nama_barang' => 'required',
            'kuantitas' => 'required',
            'satuan' => 'required',
        ]);

        $isirak = IsiRak::find($id);
        $isirak->update($request->all());
        $id_rak = $request->input('id_rak');

        return redirect()->route('isirak.index', ['id_rak' => $id_rak])->with('success', 'Isi Rak telah diperbarui');
    }

    public function destroy(Request $request, $id)
    {
        $id_rak = $request->input('id_rak'); // Get the 'id_rak' from the request
        $isirak = IsiRak::find($id);
        $isirak->delete();

        return redirect('/admin/isirak?id_rak=' . $id_rak)->with('success', 'Isi Rak berhasil dihapus.');
    }

}
