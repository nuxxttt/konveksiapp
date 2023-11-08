@extends('layouts.vertical', ['title' => 'Mitra'])
@include('layouts.notification')

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
@section('content')

    <div class="row mt-xl-3">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="header-title">Distribusi Kain Mitra</h4>
                </div>
                <div class="card-body">
                    <div class="responsive-table-plugin">
                        <div class="container">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Nama Barang</th>
                                        <th>Kode Barang</th>
                                        <th>Kuantitas</th>
                                        <th>Ket. Waktu</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($distribusiData as $distribusi)
                                        <tr>
                                            <td>{{ $distribusi->id }}</td>
                                            <td>
                                                @foreach($barangs as $barang)
                                                @if($barang->kode_barang == $distribusi->kode_barang)
                                                    {{ $barang->judul }}
                                                @endif
                                                @endforeach</td>                                            <td>{{ $distribusi->kode_barang }}</td>
                                            <td>{{ $distribusi->kuantitas }}</td>
                                            <td class="date-cell">
                                                {{ $distribusi->created_at->setTimezone('Asia/Jakarta')->format('Y-m-d / H:i:s') }}
                                            </td>                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div> <!-- end card body-->
            </div> <!-- end card -->
        </div><!-- end col-->
    </div>

@endsection
