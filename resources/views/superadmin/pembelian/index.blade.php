@extends('layouts.vertical', ['title' => 'Daftar Barang', 'mode' => $mode ?? '', 'demo' => $demo ?? ''])
@section('content')
@section('css')
    @vite([
        'node_modules/datatables.net-bs5/css/dataTables.bootstrap5.min.css',
        'node_modules/datatables.net-responsive-bs5/css/responsive.bootstrap5.min.css',
        'node_modules/datatables.net-fixedcolumns-bs5/css/fixedColumns.bootstrap5.min.css',
        'node_modules/datatables.net-fixedheader-bs5/css/fixedHeader.bootstrap5.min.css',
        'node_modules/datatables.net-buttons-bs5/css/buttons.bootstrap5.min.css',
        'node_modules/datatables.net-select-bs5/css/select.bootstrap5.min.css',
        'node_modules/admin-resources/rwd-table/rwd-table.min.css',
    ])
@endsection
@php
    use App\Models\Mitra;
    $mitras = Mitra::all();
@endphp
@section('content')
<div class="row mt-xl-3">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-md-6">
                        <h4 class="header-title">Daftar Barang Masuk</h4>
                        <a href="/admin/cetakpdf/allbeli?title=Laporan%20Pembelian&status=beli" class="btn btn-primary rounded-pill"><i class="ri-file-download-line"></i></a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="responsive-table-plugin">
                    <div class="">
                        <div class="table-responsive" data-pattern="priority-columns">
                            <table id="basic-datatable" class="table table-striped dt-responsive nowrap w-100">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Kode Barang</th>
                                        <th>Category</th>
                                        <th>Harga Pokok</th>
                                        <th>Harga Jual</th>
                                        <th>Kuantitas</th>
                                        <th></th> {{-- Added a new column for the Details button --}}
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($pembelians as $pembelian)
                                    <tr>
                                        <td>{{ $pembelian->id }}</td>
                                        <td>
                                            @foreach($barangs as $barang)
                                            @if($barang->kode_barang == $pembelian->kode_barang)
                                                {{ $barang->judul }}
                                            @endif
                                            @endforeach</td>
                                        <td>
                                            @foreach($kategorys as $kategori)
                                            @if($kategori->id == $pembelian->category_id)
                                                {{ $kategori->product }}
                                            @endif
                                            @endforeach
                                        </td>
                                        <td>{{ 'Rp. ' . number_format($pembelian->harga_pokok, 2, ',', '.'); }}</td>
                                        <td>{{ 'Rp. ' . number_format($pembelian->harga_jual, 2, ',', '.'); }}</td>
                                        <td>{{ $pembelian->stok }}</td>
                                        <td>
                                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#standard-modal{{ $pembelian->id }}"><i class="ri-eye-line"></i></button>
                                            <a href="/admin/cetakpdf/{{$pembelian->kode_transaksi}}?title=Nota Pembelian" class="me-1 ">
                                                <button type="submit" class="btn btn-secondary"><i class="ri-file-download-line"></i></button>
                                            </a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div> <!-- end card body -->
        </div> <!-- end card -->
    </div><!-- end col -->
</div>

@foreach($pembelians as $pembelian)
<div id="standard-modal{{ $pembelian->id }}" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="standard-modalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <p><strong>Supplier:</strong> {{ $pembelian->supplier->supplier }}</p>
                <p><strong>Kode Transaksi:</strong> {{ $pembelian->kode_transaksi }}</p>
                <p><strong>Waktu:</strong> {{ $pembelian->created_at->setTimezone('Asia/Jakarta')->format('Y-m-d H:i:s') }}</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
@endforeach
@endsection


@section('script')
@vite([
    'resources/js/pages/datatable.init.js',
    'resources/js/pages/responsive-table.init.js',
])
@endsection
