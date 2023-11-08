<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produksi;
use App\Models\Mitra;
use App\Models\Barang;

class ProduksiHistoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $produksi = Produksi::all();
        $role = auth()->user()->role;
        $mitras = Mitra::all();
        $barang = Barang::all();
        return view('admin.produksihistory.index', compact('produksi', 'role', 'mitras', 'barang'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
