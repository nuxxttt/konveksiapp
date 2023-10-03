<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\PesilatModel;

class PesilatController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if ($request->hasFile('persyaratan')) {
             // menyimpan data file yang diupload ke variabel $file
		$file = $request->file('persyaratan');
		$nama_file = time()."_".$file->getClientOriginalName();
      	        // isi dengan nama folder tempat kemana file diupload
		$tujuan_upload_file = 'document';
		$file->move($tujuan_upload_file,$nama_file);
        }
        if($request->hasFile('foto')){
        // foto
        $foto = $request->file('foto');
        $nama_foto = time()."_".$foto->getClientOriginalName();
                    // isi dengan nama folder tempat kemana file diupload
        $tujuan_upload_foto = 'foto';
        $foto->move($tujuan_upload_foto,$nama_foto);
        }
        PesilatModel::create(
            [
                'nik'=>$request->nik,
                'nama'=>$request->pesilat,
                'hp'=>$request->hp,
                'jenis_kelamin'=>$request->kelamin,
                'tanggal_lahir'=>$request->tanggal_lahir,
                'alamat'=>$request->alamat,
                'foto'=>"$tujuan_upload_foto/$nama_foto",
                'persyaratan'=>"$tujuan_upload_file/$nama_file",
                'id_kontigen'=>$request->id_kontigen,
                'status'=>"active",
            ]
            );
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
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
