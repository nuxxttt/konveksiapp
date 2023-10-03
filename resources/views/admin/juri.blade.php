@extends('layouts.vertical', ['title' => 'Juri', 'mode' => $mode ?? '', 'demo' => $demo ?? ''])
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
    ])
@endsection
    @php
        use App\Models\KontigenModel;
        $index = 1;
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
                <h4 class="header-title">Data Juri Lomba</h4>
                {{-- <div class="button mt-2">
                    <a href="/{{$role}}/kontigen/add" class="btn btn-primary rounded-pill">Tambah Data</a>
                </div> --}}
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
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    {{-- @php
                                        $id =auth()->user()->id;
                                        $data = KontigenModel::where('id_user',$id)->get();
                                    
                                    @endphp
                                    @foreach ($data as $item)
                                    <tr>
                                        <td>{{$index}}</td>
                                        <td>{{$item->kontigen}}</td>
                                        <td>Manager:{{$item->manager}}
                                            <br>
                                            Official:{{$item->official}}
                                        </td>
                                        <td style="color: green">{{$item->status}}</td>
                                        <td>test</td>
                                    </tr>
                                    @php
                                        $index++
                                    @endphp
                                    @endforeach --}}

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