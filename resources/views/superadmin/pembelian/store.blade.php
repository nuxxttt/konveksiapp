@extends('layouts.vertical', ['title' => 'Tambah Barang', 'mode' => $mode ?? '', 'demo' => $demo ?? ''])

@section('content')
    @include('layouts.shared/page-title', ['sub_title' => 'Tambah Barang', 'page_title' => 'Tambah Barang'])
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        Tambah Barang
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('barang.store') }}">
                            @csrf

                            <!-- Form fields for adding attributes -->
                            <div class="form-group">
                                <label for="uuid">UUID:</label>
                                <input type="text" name="uuid" id="uuid" class="form-control" value="{{ old('uuid') }}">
                            </div>

                            <div class="form-group">
                                <label for="category_id">Category ID:</label>
                                <input type="text" name="category_id" id="category_id" class="form-control" value="{{ old('category_id') }}">
                            </div>

                            <div class="form-group">
                                <label for="supplier_id">Supplier ID:</label>
                                <input type="text" name="supplier_id" id="supplier_id" class="form-control" value="{{ old('supplier_id') }}">
                            </div>

                            <div class "form-group">
                                <label for="kode_barang">Kode Barang:</label>
                                <input type="text" name="kode_barang" id="kode_barang" class="form-control" value="{{ old('kode_barang') }}">
                            </div>

                            <div class="form-group">
                                <label for="harga_jual">Harga Jual:</label>
                                <input type="text" name="harga_jual" id="harga_jual" class="form-control" value="{{ old('harga_jual') }}">
                            </div>

                            <div class="form-group">
                                <label for="harga_pokok">Harga Pokok:</label>
                                <input type="text" name="harga_pokok" id="harga_pokok" class="form-control" value="{{ old('harga_pokok') }}">
                            </div>

                            <div class="form-group">
                                <label for="stok">Stok:</label>
                                <input type="text" name="stok" id="stok" class="form-control" value="{{ old('stok') }}">
                            </div>

                            <div class="form-group">
                                <label for="status">Status:</label>
                                <input type="text" name="status" id="status" class="form-control" value="{{ old('status') }}">
                            </div>

                            <button type="submit" class="btn btn-primary">Tambah</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
