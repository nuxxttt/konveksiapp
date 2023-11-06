<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Rak;
use Illuminate\Support\Facades\Log;

class RakController extends Controller
{
    public function index()
    {
        $raks = Rak::all();
        return view('admin.rak.index', compact('raks'));
    }

    public function create()
    {
        return view('admin.rak.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
        ]);

        Rak::create($request->all());

        return redirect()->route('rak.index')->with('success', 'Berhasil menambahkan Data Rak baru');
    }

    public function show($id)
    {
        $rak = Rak::find($id);
        return view('admin.rak.show', compact('rak'));
    }

    public function edit($id)
    {
        $rak = Rak::find($id);
        return view('admin.rak.edit', compact('rak'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required',
        ]);

        $rak = Rak::find($id);
        $rak->update($request->all());

        return redirect()->route('rak.index')->with('success', 'Data Rak berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $rak = Rak::find($id);
        $rak->delete();

        return redirect()->route('rak.index')->with('success', 'Data Rak berhasil dihapus.');
    }

}
