@extends('layouts.vertical', ['title' => 'Daftar Kategori', 'mode' => $mode ?? '', 'demo' => $demo ?? ''])

@php
    $role = auth()->user()->role;
@endphp
@section('css')
    @vite([
        'node_modules/datatables.net-bs5/css/dataTables.bootstrap5.min.css',
        'node_modules/datatables.net-responsive-bs5/css/responsive.bootstrap5.min.css',
        'node_modules/datatables.net-fixedcolumns-bs5/css/fixedColumns.bootstrap5.min.css',
        'node_modules/datatables.net-fixedheader-bs5/css/fixedHeader.bootstrap5.min.css',
        'node_modules/datatables.net-buttons-bs5/css/buttons.bootstrap5.min.css',
        'node_modules/datatables.net-select-bs5/css/select.bootstrap5.min.css',
        'node_modules/admin-resources/rwd-table/rwd-table.min.css',
        'node_modules/jquery-toast-plugin/dist/jquery.toast.min.css',
    ])
@endsection
    @php
        use App\Models\Rak;
        $index = 1;
    @endphp
@section('content')
<div class="row mt-xl-3">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-lg-6">
                        <h4 class="header-title">Data Rak</h4>
                        <div class="button mt-2">
                            <a href="/{{$role}}/rak/create" class="btn btn-primary rounded-pill">Tambah Data</a>
                        </div>
                    </div>
                    @include('layouts.notifications')

                </div>

            </div>
            <div class="card-body">
                <div class="responsive-table-plugin">
                    <div class="">
                        <div class="table-responsive" data-pattern="priority-columns">
                            <table id="basic-datatable" class="table table-striped dt-responsive nowrap w-100">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $id =auth()->user()->id;
                                        $data = Rak::all();

                                    @endphp
                                    @foreach ($data as $item)
                                    <tr>
                                        <td>{{$index}}</td>
                                        <td>{{$item->nama}}</td>
                                        <td>
                                            <div class="btn-group">
                                                <a href="{{ route('isirak.index') }}?id_rak={{ $item->id}}" class="me-1">
                                                    <button type="submit" class="btn btn-primary"><i class="ri-eye-line"></i></button>
                                                </a>
                                                <a href="{{ route('rak.edit', $item->id) }}" class="me-1">
                                                <button type="submit" class="btn btn-primary"><i class="ri-edit-line"></i></button>
                                            </a>
                                            <form action="{{ route('rak.destroy', $item->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger"><i class="ri-delete-bin-6-line"></i></button>
                                        </form>
                                            </div>
                                    </td>
                                    </tr>
                                    @php
                                        $index++
                                    @endphp
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
<!-- end row-->

@endsection
@section('script')
@vite([
    'resources/js/pages/datatable.init.js',
    'resources/js/pages/responsive-table.init.js',])
@endsection

@section('script-bottom')
    @vite(['resources/js/pages/toastr.init.js',])
@endsection
