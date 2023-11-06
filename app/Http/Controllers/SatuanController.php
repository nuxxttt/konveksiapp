<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Satuan;
use Illuminate\Support\Facades\Log;

class SatuanController extends Controller
{
    public function index()
    {
        $satuans = Satuan::all();
        return view('admin.satuan.index', compact('satuans'));
    }

    public function create()
    {
        return view('admin.satuan.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
        ]);

        Satuan::create($request->all());

        return redirect()->route('satuan.index')->with('success', 'Berhasil membuat satuan baru.');
    }

    public function show($id)
    {
        $satuan = Satuan::find($id);
        return view('admin.satuan.show', compact('satuan'));
    }

    public function edit($id)
    {
        $satuan = Satuan::find($id);
        return view('admin.satuan.edit', compact('satuan'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required',
        ]);

        $satuan = Satuan::find($id);
        $satuan->update($request->all());

        return redirect()->route('satuan.index')->with('success', 'Satuan berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $satuan = Satuan::find($id);
        $satuan->delete();

        return redirect()->route('satuan.index')->with('success', 'Satuan berhasil dihapus.');
    }

}
