<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mitra;

class MitraApiController extends Controller
{
    public function index()
    {
        $mitras = Mitra::all();
        return response()->json(['data' => $mitras]);
    }

    public function create()
    {

    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string',
            'phone' => 'required|string',
            'alamat' => 'required|string',
        ]);

        $mitra = Mitra::create($request->all());

        return response()->json($mitra, 201);
    }

    public function show($id)
    {
        $mitra = Mitra::find($id);

        if (!$mitra) {
            return response()->json(['message' => 'Mitra not found'], 404);
        }

        return response()->json($mitra);
    }

    public function edit($id)
    {

    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required|string',
            'phone' => 'required|string',
            'alamat' => 'required|string',
        ]);

        $mitra = Mitra::find($id);

        if (!$mitra) {
            return response()->json(['message' => 'Mitra not found'], 404);
        }

        $mitra->update($request->all());

        return response()->json($mitra);
    }

    public function destroy($id)
    {
        $mitra = Mitra::find($id);

        if (!$mitra) {
            return response()->json(['message' => 'Mitra not found'], 404);
        }

        $mitra->delete();

        return response()->json(['message' => 'Mitra deleted'], 204); // Return a 204 No Content status after deletion.
    }
}
