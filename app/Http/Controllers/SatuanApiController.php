<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\Satuan;
use Illuminate\Support\Facades\Log;

class SatuanApiController extends Controller
{
    public function index()
    {
        $satuans = Satuan::all();
        return response()->json(['satuans' => $satuans], Response::HTTP_OK);
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
        ]);

        $satuan = Satuan::create($request->all());

        return response()->json(['message' => 'Satuan created successfully', 'satuan' => $satuan], Response::HTTP_CREATED);
    }

    public function show($id)
    {
        $satuan = Satuan::find($id);

        if (!$satuan) {
            return response()->json(['message' => 'Satuan not found'], Response::HTTP_NOT_FOUND);
        }

        return response()->json($satuan, Response::HTTP_OK);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required',
        ]);

        $satuan = Satuan::find($id);

        if (!$satuan) {
            return response()->json(['message' => 'Satuan not found'], Response::HTTP_NOT_FOUND);
        }

        $satuan->update($request->all());

        return response()->json(['message' => 'Satuan updated successfully', 'satuan' => $satuan], Response::HTTP_OK);
    }

    public function destroy($id)
    {
        $satuan = Satuan::find($id);

        if (!$satuan) {
            return response()->json(['message' => 'Satuan not found'], Response::HTTP_NOT_FOUND);
        }

        $satuan->delete();

        return response()->json(['message' => 'Satuan deleted successfully'], Response::HTTP_NO_CONTENT);
    }
}
