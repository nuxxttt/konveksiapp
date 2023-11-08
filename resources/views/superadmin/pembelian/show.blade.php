@extends('layouts.vertical', ['title' => 'Detail Barang', 'mode' => $mode ?? '', 'demo' => $demo ?? ''])

@section('content')
@include('layouts.shared/page-title', ['sub_title' => 'Detail Barang', 'page_title' => 'Detail Barang'])
<div class="container">
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    Detail Barang
                </div>
                <div class="card-body">
                    <ul>
                        <li><strong>ID:</strong> {{ $barang->id }}</li>
                        <li><strong>UUID:</strong> {{ $barang->uuid }}</li>
                        <li><strong>Category ID:</strong> {{ $barang->category_id }}</li>
                        <li><strong>Supplier ID:</strong> {{ $barang->supplier_id }}</li>
                        <li><strong>Kode Barang:</strong> {{ $barang->kode_barang }}</li>
                        <li><strong>Harga Jual:</strong> {{ $barang->harga_jual }}</li>
                        <li><strong>Harga Pokok:</strong> {{ $barang->harga_pokok }}</li>
                        <li><strong>Stok:</strong> {{ $barang->stok }}</li>
                        <li><strong>Status:</strong> {{ $barang->status }}</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
@endsection
