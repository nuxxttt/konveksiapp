
@extends('layouts.vertical', ['title' => 'Edit Mitra', 'mode' => $mode ?? '', 'demo' => $demo ?? ''])
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

    $mitra = Mitra::find($id);

@endphp
@section('content')
<div class="row mt-xl-3">
    @include('layouts.shared/page-title', ['sub_title' => 'Edit Supplier', 'page_title' => 'Edit Supplier']);
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4 class="header-title">Formulir Tambah Data Category</h4>
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('mitra.update', $mitra->id) }}">
                    @csrf
                            @method('PUT')
                            <div class="g-2">
                                <div class="form-group mb-3 w-50">
                                    <label for="nama" class="form-label">Nama Supplier:</label>
                                    <input type="text" name="nama" class="form-control" required value="{{ $mitra->nama }}">
                                </div>
                                <div class="form-group mb-3 w-50">
                                    <label for="phone" class="form-label">Nomor Telepon:</label>
                                    <input type="text" name="phone" class="form-control" required value="{{ $mitra->phone }}">
                                </div>
                                <div class="form-group mb-3 w-50">
                                    <label for="alamat" class="form-label">Alamat:</label>
                                    <input type="text" name="alamat" class="form-control" required value="{{ $mitra->alamat }}">
                                </div>
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-primary mt-2">Submit</button>
                            </div>
                        </div>
                        </form>


                <!-- end row-->
            </div> <!-- end card-body -->
        </div> <!-- end card -->
    </div><!-- end col -->
</div>
@endsection
