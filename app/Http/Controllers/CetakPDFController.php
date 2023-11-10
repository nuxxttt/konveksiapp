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
    public function show(Request $request, string $kode_transaksi)
    {
        // Get the value of the "title" parameter from the URL
        $title = $request->input('title');

        if ($kode_transaksi != 'alljual' && $kode_transaksi != 'allbeli') {
            $data = History::where('kode_transaksi', $kode_transaksi)->get();

            $pdf = PDF::loadView('admin.receipt', compact('data', 'title'));

            // Use the $title variable in the PDF filename
            $filename = $kode_transaksi . '.pdf';
        } else {
            $data = History::where('status', $kode_transaksi)->get();

            $pdf = PDF::loadView('admin.receiptall', compact('data', 'title'));

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
