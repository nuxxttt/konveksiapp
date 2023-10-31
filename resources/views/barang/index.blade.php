@extends('layouts.vertical', ['title' => 'Dashboard Konveksi', 'mode' => $mode ?? '', 'demo' => $demo ?? ''])

@section('content')
@include('layouts.shared/page-title', ['sub_title' => 'Menu', 'page_title' => 'Dashboard'])
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
$role = auth()->user()->role;
$base = "$role/barang";
@endphp
@section('content')
    <style>
        .card-body th{
            color: rgb(10, 10, 10);
        }
        .card-body td{
            color: rgb(10, 10, 10);
        }
    </style>
<div class="row mt-xl-3">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4 class="header-title">Daftar Barang</h4>
                <div class="button mt-2">
                    <a href="{{ route("any", "$role/barang/create") }}" class="btn btn-primary rounded-pill">Tambah Data</a>
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
                                        <th>Product</th>
                                        <th>Category</th>
                                        <th>Supplier</th>
                                        <th>Kode Barang</th>
                                        <th>Harga Jual</th>
                                        <th>Harga Pokok</th>
                                        <th>Stok</th>
                                        <th>Status</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($barangs as $barang)
                                    <tr>
                                        <td>{{ $barang->id }}</td>
                                        <td>{{ $barang->judul }}</td>
                                        <td>{{ $barang->category_id }}</td>
                                        <td>{{ $barang->supplier_id }}</td>
                                        <td>{{ $barang->kode_barang }}</td>
                                        <td>{{ $barang->harga_jual }}</td>
                                        <td>{{ $barang->harga_pokok }}</td>
                                        <td>{{ $barang->stok }}</td>
                                        <td><?php
                                            if ($barang->status == 'Tersedia') {
                                                echo '<span class="badge bg-info-subtle text-info">' . $barang->status . '</span>';
                                            } elseif ($barang->status == 'Dibatalkan') {
                                                echo '<span class="badge bg-pink-subtle text-pink">' . $barang->status . '</span>';
                                            }
                                            ?>
                                            </td>
                                        <td>
                                            <div class="btn-group">
                                                <a href="{{ route('barang.edit', $barang->id) }}" class="me-1">
                                                    <button type="submit" class="btn btn-primary"><i class="ri-edit-line"></i></button>
                                                </a>

                                                <form action="{{ route('barang.destroy', $barang->id) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger"><i class="ri-delete-bin-6-line"></i></button>
                                                </form>
                                            </div>

                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

            </div> <!-- end card body-->
        </div> <!-- end card -->
    </div><!-- end col-->

</div>
@endsection

<!-- end row-->

@endsection
@section('script')
@vite([
    'resources/js/pages/datatable.init.js',
    'resources/js/pages/responsive-table.init.js',])
@endsection
