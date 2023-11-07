<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Barang;
use App\Models\Supplier;
use App\Models\Category;
use App\Models\History;
use Illuminate\Support\Facades\Log;
use Ramsey\Uuid\Uuid;
use Illuminate\Support\Str; // Import Str from Illuminate\Support
class HistoryController extends Controller
{
    public function index()
    {
        $barangs = Barang::all();
        $suppliers = Supplier::all();
        $kategorys = Category::all();

        if (Str::contains(url()->current(), 'pembelian')) {
            // If the current URL contains 'pembelian'
            $pembelians = History::where('status', 'beli')->get();
            return view('admin.pembelian.index', compact('barangs', 'suppliers', 'kategorys', 'pembelians'));
        } else {
            // Default to 'penjualan' view
            $penjualans = History::where('status', 'jual')->get();
            return view('admin.penjualan.index', compact('barangs', 'suppliers', 'kategorys', 'penjualans'));
        }
    }

    public function penjualan_create()
    {
        $suppliers = Supplier::all();
        $kategorys = Category::all();
        return view('admin.penjualan.create', compact('suppliers', 'kategorys'));
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

        Barang::create($requestData);

        return redirect()->route('barang.index')->with('success', 'Barang berhasil disimpan.');
    }

    public function show($id)
    {
        $barang = Barang::find($id);
        $suppliers = Supplier::all();
        $kategorys = Category::all();
        return view('admin.barang.show', compact('barang', 'suppliers', 'kategorys'));
    }

    public function edit($id)
    {
        $barang = Barang::find($id);
        $suppliers = Supplier::all();
        $kategorys = Category::all();
        return view('admin.barang.edit', compact('barang', 'suppliers', 'kategorys'));
    }



    public function update(Request $request, Barang $barang)
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

        $barang->update($request->all());

        return redirect()->route('barang.index')->with('success', 'Barang berhasil diperbarui.');
    }


    public function destroy($id)
    {
        $barang = Barang::find($id);
        $barang->delete();

        return redirect()->route('barang.index')->with('success', 'Barang berhasil dihapus.');
    }
}
