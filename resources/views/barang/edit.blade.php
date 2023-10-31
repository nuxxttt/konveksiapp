@extends('layouts.vertical', ['title' => 'Edit Barang', 'mode' => $mode ?? '', 'demo' => $demo ?? ''])

@section('content')

                    <div class="container w-50">
                        @include('layouts.shared/page-title', ['sub_title' => 'Edit Barang', 'page_title' => 'Edit Barang'])

                        <div class="row">
                            <div class="">
                                <div class="card">
                                    <div class="card-header">
                                        Edit Barang
                                    </div>
                                    <div class="card-body">
                                        <form method="POST" action="{{ route('barang.update', $barang->id) }}">
                                            @csrf
                                            @method('PUT')
                                            <div class="form-group mb-3">
                                                <label for="judul" class="form-label">Products:</label>
                                                <input type="text" name="judul" class="form-control" required value="{{ $barang->judul }}">
                                            </div>
                                            <div class="form-group mb-3">
                                                <label for="category_id" class="form-label">Category ID:</label>
                                                <input type="number" name="category_id" class="form-control" required value="{{ $barang->category_id }}">
                                            </div>
                                            <div class="form-group mb-3">
                                                <label for="supplier_id" class="form-label">Supplier ID:</label>
                                                <input type="number" name="supplier_id" class="form-control" required value="{{ $barang->supplier_id }}">
                                            </div>
                                            <div class="form-group mb-3">
                                                <label for="kode_barang" class="form-label">Kode Barang:</label>
                                                <input type="text" name="kode_barang" class="form-control" required value="{{ $barang->kode_barang }}">
                                            </div>
                                            <div class="form-group mb-3">
                                                <label for="harga_jual" class="form-label">Harga Jual:</label>
                                                <input type="number" name="harga_jual" class="form-control" required value="{{ $barang->harga_jual }}">
                                            </div>
                                            <div class="form-group mb-3">
                                                <label for="harga_pokok" class="form-label">Harga Pokok:</label>
                                                <input type="number" name="harga_pokok" class="form-control" required value="{{ $barang->harga_pokok }}">
                                            </div>
                                            <div class="form-group mb-3">
                                                <label for="stok" class="form-label">Stok:</label>
                                                <input type="number" name="stok" class="form-control" required value="{{ $barang->stok }}">
                                            </div>
                                            <div class="form-group mb-3">
                                                <label for="status" class="form-label">Status:</label>
                                                <input type="text" name="status" class="form-control" required value="{{ $barang->status }}">
                                            </div>
                                            <div class="form-group mb-3">
                                                <button type="submit" class="btn btn-primary">Simpan</button>
                                            </div>
                                        </form>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


@endsection
