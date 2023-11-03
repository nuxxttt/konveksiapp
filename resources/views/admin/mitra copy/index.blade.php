@extends('layouts.vertical', ['title' => 'Mitra'])
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

    @include('layouts.shared/page-title', ['sub_title' => 'Daftar Administrator', 'page_title' => 'Administrator'])

    <div class="row mt-xl-3">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="header-title">Daftar Administrator</h4>
                    <div class="button mt-2">
                        <a href="{{ route('profile.create') }}" class="btn btn-primary rounded-pill">Tambah Data</a>
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
                                            <th>Nama </th>
                                            <th>Email</th>
                                            <th>Role</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($profiles as $profile)
                                        @if($profile->role !== 'superadmin')
                                            <tr>
                                                <td>{{ $profile->id }}</td>
                                                <td>{{ $profile->name }}</td>
                                                <td>{{ $profile->email }}</td>
                                                <td>{{ $profile->role }}</td>
                                                <td>
                                                    <div class="btn-group">
                                                        <a href="{{ route('profile.edit', $profile->id) }}" class="me-1">
                                                            <button type="submit" class="btn btn-primary"><i class="ri-edit-line"></i></button>
                                                        </a>
                                                        <form action="{{ route('profile.destroy', $profile->id) }}" method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-danger"><i class="ri-delete-bin-6-line"></i></button>
                                                        </form>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endif
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