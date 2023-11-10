<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\History;
use PDF;
class CetakPDFController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

    }

    /**
     * Display the specified resource.
     */
    public function show(string $kode_transaksi)
    {
        if ($kode_transaksi != 'jual' && $kode_transaksi != 'beli') {
            $data = History::where('kode_transaksi', $kode_transaksi)->get();

            $pdf = PDF::loadView('admin.receipt', compact('data'));

            return $pdf->download('receipt.pdf');
        } else {
            $data = History::where('status', $kode_transaksi)->get();

            $pdf = PDF::loadView('admin.receipt', compact('data'));

            return $pdf->download('receipt.pdf');
        }
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
