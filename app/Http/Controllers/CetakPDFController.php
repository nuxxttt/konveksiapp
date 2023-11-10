<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\History;
use App\Models\Barang;
use App\Models\Produksi;
use App\Models\Mitra;
use App\Models\Category;
use PDF;
use Illuminate\Support\Carbon;

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
    public function show(Request $request, string $kode_transaksi)
    {
        $timee = Carbon::now('Asia/Jakarta');

        // Get the value of the "title" parameter from the URL
        $title = $request->input('title');

        if ($kode_transaksi == 'alljual' || $kode_transaksi == 'allbeli') {
            $status = $request->input('status');
            $data = History::where('status', $status)->get();
            $barangs = Barang::all();
            $kategorys = Category::all();
            $pdf = PDF::loadView('admin.receiptall', compact('data', 'title', 'barangs', 'kategorys'));

            // Use the $title variable in the PDF filename
            $filename = $kode_transaksi . " (" . $timee . ") " . '.pdf';
        } elseif ($kode_transaksi == 'produksiall') {
            $produksi = Produksi::all();
            $mitras = Mitra::all();
            $barang = Barang::all();

            $pdf = PDF::loadView('admin.produksiall', compact('produksi', 'mitras', 'barang', 'title'));

            $filename = $kode_transaksi . '.pdf';

        } else {
            $data = History::where('kode_transaksi', $kode_transaksi)->get();

            $pdf = PDF::loadView('admin.receipt', compact('data', 'title'));

            // Use the $title variable in the PDF filename
            $filename = $kode_transaksi . '.pdf';
        }


        // Download the PDF
        $response = $pdf->download($filename);

        // Redirect back to the previous page
        return $response->header('Refresh', '0;url=' . url()->previous());
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
