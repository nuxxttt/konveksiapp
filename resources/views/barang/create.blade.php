@extends('layouts.vertical', ['title' => 'Tambah Barang', 'mode' => $mode ?? '', 'demo' => $demo ?? ''])

@section('content')
<div class="container">
    @include('layouts.shared/page-title', ['sub_title' => 'Tambah Barang', 'page_title' => 'Tambah Barang'])

    <div class="card">
        <div class="card-body">
            <form method="POST" action="{{ route('barang.store') }}">
                @csrf
                <div class="form-group mb-3">
                    <label for="judul" class="form-label">Judul:</label>
                    <input type="text" name="judul" class="form-control" required>
                </div>
                <div class="form-group mb-3">
                    <label for="category_id" class="form-label">Category ID:</label>
                    <input type="number" name="category_id" class="form-control" required>
                </div>
                <div class="form-group mb-3">
                    <label for="supplier_id" class="form-label">Supplier ID:</label>
                    <input type="number" name="supplier_id" class="form-control" required>
                </div>
                <div class="form-group mb-3">
                    <label for="kode_barang" class="form-label">Kode Barang:</label>
                    <input type="text" name="kode_barang" class="form-control" required>
                </div>
                <div class="form-group mb-3">
                    <label for="harga_jual" class="form-label">Harga Jual:</label>
                    <input type="number" name="harga_jual" class="form-control" required>
                </div>
                <div class="form-group mb-3">
                    <label for="harga_pokok" class="form-label">Harga Pokok:</label>
                    <input type="number" name="harga_pokok" class="form-control" required>
                </div>
                <div class="form-group mb-3">
                    <label for="stok" class="form-label">Stok:</label>
                    <input type="number" name="stok" class="form-control" required>
                </div>
                <div class="form-group mb-3">
                    <label for="status" class="form-label">Status:</label>
                    <input type="text" name="status" class="form-control" required>
                </div>
                <div class="form-group mb-3">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
