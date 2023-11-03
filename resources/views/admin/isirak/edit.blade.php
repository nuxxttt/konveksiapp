
@extends('layouts.vertical', ['title' => 'Edit Kategori', 'mode' => $mode ?? '', 'demo' => $demo ?? ''])

@section('content')
<div class="container w-50">
    @include('layouts.shared/page-title', ['sub_title' => 'Edit Kategori', 'page_title' => 'Edit Kategori'])

    <form method="POST" action="{{ route('isirak.update',  $isirak->id) }}">
        @csrf
        @method('PUT')
        <div class="form-group mb-3">
            <label for="nama_barang" class="form-label">Nama Kategori:</label>
            <input type="text" name="nama_barang" class="form-control" required value="{{ $isirak->nama_barang }}">
        </div>
        <div class="my-3 col-md-6">
            <input type="hidden" type="text" name="id_rak" id="id_rak" class="form-control" value="{{ $id_rak }}">
        </div>
        <div class="form-group mb-3">
            <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
    </form>
</div>
@endsection
