<?php

// app/Http/Controllers/BarangController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BarangController extends Controller
{
    // Menampilkan daftar barang
    public function index()
    {
        $barangs = Barang::all();
        return view('barang.index', compact('barangs'));
    }

    // Menampilkan form untuk membuat barang baru
    public function create()
    {
        return view('barang.create');
    }

    // Menyimpan barang baru ke database
    public function store(Request $request)
    {
        // Validasi inputan jika diperlukan
        $request->validate([
            'uuid' => 'required',
            'category_id' => 'required',
            'supplier_id' => 'required',
            'kode_barang' => 'required',
            'harga_jual' => 'required',
            'harga_pokok' => 'required',
            'stok' => 'required',
            'status' => 'required',
        ]);

        // Simpan barang ke database
        Barang::create($request->all());

        return redirect()->route('barang.index')->with('success', 'Barang berhasil disimpan.');
    }

    // Menampilkan detail barang
    public function show($id)
    {
        $barang = Barang::find($id);
        return view('barang.show', compact('barang'));
    }

    // Menampilkan form untuk mengedit barang
    public function edit($id)
    {
        $barang = Barang::find($id);
        return view('barang.edit', compact('barang'));
    }

    // Update data barang
    public function update(Request $request, $id)
    {
        $request->validate([
            'uuid' => 'required',
            'category_id' => 'required',
            'supplier_id' => 'required',
            'kode_barang' => 'required',
            'harga_jual' => 'required',
            'harga_pokok' => 'required',
            'stok' => 'required',
            'status' => 'required',
        ]);

        $barang = Barang::find($id);
        $barang->update($request->all());

        return redirect()->route('barang.index')->with('success', 'Barang berhasil diperbarui.');
    }

    // Hapus barang
    public function destroy($id)
    {
        $barang = Barang::find($id);
        $barang->delete();

        return redirect()->route('barang.index')->with('success', 'Barang berhasil dihapus.');
    }
}
