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
                    <h4 class="header-title">Data Pemotongan</h4>
                    <div class="button mt-2">
                        <a href="{{ route('pemotongan.history') }}" class="btn btn-primary rounded-pill">History Data</a>
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
                                            <th>Nama Pemotongan</th>
                                            <th>Perbandingan</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($pemotongan as $pemotongans)
                                            <tr>
                                                <td>{{ $pemotongans->id }}</td>
                                                <td>{{ $pemotongans->nama_konversi }}</td>
                                                <td>{{ $pemotongans->hasil_id1 }}:{{ $pemotongans->hasil_id2 }}</td>
                                                <td>
                                                    <div class="btn-group">
                                                        <a href="{{ route('pemotongan.edit', $pemotongans->id) }}" class="me-1">
                                                            <button type="submit" class="btn btn-primary"><i class="ri-edit-line"></i></button>
                                                        </a>
                                                        <form action="{{ route('pemotongan.destroy', $pemotongans->id) }}" method="POST">
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
