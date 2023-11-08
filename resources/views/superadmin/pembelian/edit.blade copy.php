@extends('layouts.vertical', ['title' => 'Edit Barang', 'mode' => $mode ?? '', 'demo' => $demo ?? ''])
@php
    $status = ["Tersedia", "Dibatalkan"]
@endphp
@section('content')
<div class="container">
    @include('layouts.shared/page-title', ['sub_title' => 'Edit Barang', 'page_title' => 'Edit Barang'])

    <div class="card">
        <div class="card-body">
            <form method="POST" action="{{ route('barang.update', $barang->id) }}">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group mb-3">
                            <label for="judul" class="form-label">Products:</label>
                            <input type="text" name="judul" class="form-control" required value="{{ $barang->judul }}">
                        </div>
                        <div class="form-group mb-3">
                            <label for="category_id" class="form-label">Category:</label>
                            <select name="category_id" class="form-select">
                                @foreach($kategorys as $kategori)
                                    @if($kategori->id == $barang->category_id)
                                        <option value="{{ $kategori->id }}" selected>{{ $kategori->product }}</option>
                                    @else
                                        <option value="{{ $kategori->id }}">{{ $kategori->product }}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group mb-3">
                            <label for="supplier_id" class="form-label">Supplier:</label>
                            <select name="supplier_id" class="form-select">
                                @foreach($suppliers as $supplier)
                                    @if($supplier->id == $barang->supplier_id)
                                        <option value="{{ $supplier->id }}" selected>{{ $supplier->supplier }}</option>
                                    @else
                                        <option value="{{ $supplier->id }}">{{ $supplier->supplier }}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group mb-3">
                            <label for="kode_barang" class="form-label">Kode Barang:</label>
                            <input type="text" name="kode_barang" class="form-control" required value="{{ $barang->kode_barang }}">
                        </div>
                        <div class="form-group mb-3">
                            <label for="harga_jual" class="form-label">Harga Jual:</label>
                            <input type="number" name="harga_jual" class="form-control" required value="{{ $barang->harga_jual }}">
                        </div>
                    </div>
                    <div class="col-md-6">

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
                            <select name="status" class="form-control" required>
                                @foreach($status as $s)
                                    @if($s == $barang->status)
                                        <option value="{{ $s }}" selected>{{ $s }}</option>
                                    @else
                                        <option value="{{ $s }}">{{ $s }}</option>
                                    @endif
                                @endforeach
                            </select>                        </div>
                            <div class="form-group mb-3">
                                <label for="keterangan" class="form-label">Keterangan:</label>
                                <select name="keterangan" class="form-select">
                                    <option value="Barang Masuk">Barang Masuk</option>
                                    <option value="Dibatalkan">Dari Client</option>
                        </select>                        </div>
                    </div>
                </div>
                <div class="form-group mb-3">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
