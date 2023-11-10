<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Distribusi;
use App\Models\Mitra;
use App\Models\Barang;

class DistribusiApiController extends Controller
{
    public function index()
    {
        $distribusiData = Distribusi::all();
        $mitras = Mitra::all();
        return response()->json($distribusiData);
    }

    public function store(Request $request)
    {
        $request->validate([
            'mitra_id' => 'required',
            'created_by' => 'required',
            'kode_barang' => 'required',
            'kuantitas' => 'required|numeric',
        ]);

        // Retrieve the Barang based on the provided 'kode_barang'
        $barang = Barang::where('kode_barang', $request->kode_barang)->first();

        if ($barang) {
            $kuantitas = (int)$request->kuantitas;

            // Check if there is enough stock
            if ($barang->stok >= $kuantitas) {
                // Subtract the stock of the Barang with the quantity requested
                $barang->stok -= $kuantitas;
                $barang->save();

                // Create a new Distribusi entry
                Distribusi::create([
                    'mitra_id' => $request->mitra_id,
                    'created_by' => $request->created_by,
                    'kode_barang' => $request->kode_barang,
                    'kuantitas' => $kuantitas,
                ]);

                return response()->json(['message' => 'Distribusi created successfully'], 201);
            } else {
                return response()->json(['error' => 'Not enough stock'], 400);
            }
        } else {
            return response()->json(['error' => 'Barang not found'], 404);
        }
    }


    public function edit($id)
    {
        $barang = Barang::all();
        $mitra = Mitra::find($id);
        $distribusi = Distribusi::find($id);

        return response()->json(compact('distribusi', 'barang', 'mitra'));
    }

    public function update(Request $request, Distribusi $distribusi)
    {
        $request->validate([
            'mitra_id' => 'required',
            'kode_barang' => 'required',
            'kuantitas' => 'required|numeric',
        ]);

        $distribusi->update($request->all());

        return response()->json(['message' => 'Distribusi updated successfully']);
    }

    public function destroy($id)
    {
        $distribusi = Distribusi::find($id);

        if (!$distribusi) {
            return response()->json(['message' => 'Distribusi not found'], 404);
        }

        $distribusi->delete();

        return response()->json(['message' => 'Distribusi deleted successfully']);
    }
}
