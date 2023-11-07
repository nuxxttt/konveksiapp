<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\History;
use App\Models\Barang;

class HistoryApiController extends Controller
{
    public function index()
    {
        $history = History::all();
        return response()->json($history);
    }

    public function show($id)
    {
        $history = History::find($id);

        if (!$history) {
            return response()->json(['message' => 'History not found'], 404);
        }

        return response()->json($history);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'kode_barang' => 'required',
            'category_id' => 'required',
            'supplier_id' => 'required',
            'harga_pokok' => 'required',
            'harga_jual' => 'required',
            'stok' => 'required',
            'status' => 'required',
            'kode_transaksi' => 'required',
            'keterangan' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        if ($request->status === 'jual') {
            // Find the Barang with the matching kode_barang
            $barang = Barang::where('kode_barang', $request->kode_barang)->first();

            if ($barang) {
                // Subtract the stok of the barang with the stok requested
                $stokRequested = (int)$request->stok;
                $barang->stok -= $stokRequested;
                $barang->save();
            } else {
                return response()->json(['error' => 'Barang not found'], 404);
            }
        } elseif ($request->status === 'beli') {
            // Find the Barang with the matching kode_barang
            $barang = Barang::where('kode_barang', $request->kode_barang)->first();

            if ($barang) {
                // Add the stok to the barang with the stok requested
                $stokRequested = (int)$request->stok;
                $barang->stok += $stokRequested;
                $barang->save();
            } else {
                return response()->json(['error' => 'Barang not found'], 404);
            }
        } else {
            return response()->json(['error' => 'Invalid status value'], 400);
        }

        $history = new History;
        $history->fill($request->all());
        $history->save();

        return response()->json(['message' => 'History created successfully', 'history' => $history], 201);
    }


    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'kode_barang' => 'required',
            'category_id' => 'required',
            'supplier_id' => 'required',
            'harga_pokok' => 'required',
            'harga_jual' => 'required',
            'stok' => 'required',
            'status' => 'required',
            'kode_transaksi' => 'required',
            'keterangan' => 'required',
        ]);

        $history = History::find($id);

        if (!$history) {
            return response()->json(['message' => 'History not found'], 404);
        }

        $history->update($request->all());

        return response()->json(['message' => 'History updated successfully', 'history' => $history]);
    }

    public function destroy($id)
    {
        $history = History::find($id);

        if (!$history) {
            return response()->json(['message' => 'History not found'], 404);
        }

        $history->delete();

        return response()->json(['message' => 'History deleted successfully']);
    }
}
