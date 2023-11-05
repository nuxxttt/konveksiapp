<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Barang;
use App\Models\Supplier;
use App\Models\Category;
use Illuminate\Support\Facades\Log;
use Ramsey\Uuid\Uuid;

class BarangApiController extends Controller
{
    public function index()
    {
        $barangs = Barang::all();
        if ($barangs) {
            return response()->json(['data' => $barangs]);
        } else {
            return response()->json(['message' => 'Barang not found'], 404);
        }    }

    public function create()
    {
    }

    public function store(Request $request)
    {
        $request->validate([
            'category_id' => 'required|integer',
            'supplier_id' => 'required|integer',
            'kode_barang' => 'required|string',
            'harga_jual' => 'required|numeric',
            'harga_pokok' => 'required|numeric',
            'stok' => 'required|integer',
            'judul' => 'required|string',
            'status' => 'required|string',
            'keterangan' => 'required|string',
        ]);

        $uuid = Uuid::uuid4()->toString();
        $requestData = $request->all();
        $requestData['uuid'] = $uuid;

        $barang = Barang::create($requestData);

        return response()->json($barang, 201);
    }

    public function show($id)
    {
        $barang = Barang::find($id);

        if (!$barang) {
            return response()->json(['message' => 'Barang not found'], 404);
        }

        return response()->json($barang);
    }

    public function edit($id)
    {

    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'category_id' => 'required|integer',
            'supplier_id' => 'required|integer',
            'kode_barang' => 'required|string',
            'harga_jual' => 'required|numeric',
            'harga_pokok' => 'required|numeric',
            'stok' => 'required|integer',
            'judul' => 'required|string',
            'status' => 'required|string',
            'keterangan' => 'required|string',
        ]);

        $barang = Barang::find($id);

        if (!$barang) {
            return response()->json(['message' => 'Barang not found'], 404);
        }

        $barang->update($request->all());

        return response()->json($barang);
    }

    public function destroy($id)
    {
        $barang = Barang::find($id);

        if (!$barang) {
            return response()->json(['message' => 'Barang not found'], 404);
        }

        $barang->delete();

        return response()->json(['message' => 'Barang deleted'], 204); // Return a 204 No Content status after deletion.
    }
}
