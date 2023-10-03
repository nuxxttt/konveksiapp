<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\EventModel;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
        if($request->hasFile('foto')){
        // foto
        $foto = $request->file('foto');
        $nama_foto = time()."_".$foto->getClientOriginalName();
                    // isi dengan nama folder tempat kemana file diupload
        $tujuan_upload_foto = 'banner';
        $foto->move($tujuan_upload_foto,$nama_foto);
        }
        EventModel::create(
            [
                'name'=>$request->title,
                'tanggal_mulai'=>$request->start,
                'tanggal_selesai'=>$request->end,
                'max_perserta'=>$request->max,
                'status'=>$request->status,
                'catatan'=>$request->catatan,
                'img'=>"$tujuan_upload_foto/$nama_foto",
            ]
            );
        return redirect("/admin/event");
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
