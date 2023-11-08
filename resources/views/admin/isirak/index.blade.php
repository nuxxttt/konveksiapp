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
    ])
@endsection
    @php
        use App\Models\IsiRak;
        use App\Models\Rak;

        $crnm = Rak::where('id', $id_rak)->first()->nama;

        $index = 1;
    @endphp
@section('content')
<div class="row mt-xl-3">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-lg-6">
                        <h4 class="header-title">{{$crnm}}</h4>
                        <div class="button mt-2">
                            <a href="/{{$role}}/isirak/create?id_rak={{ $id_rak }}" class="btn btn-primary rounded-pill">Tambah Data</a>
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
                                        <th>Kuantitas</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $id =auth()->user()->id;
                                        $data = IsiRak::where('id_rak', $id_rak)->get();

                                    @endphp
                                    @foreach ($data as $item)
                                    <tr>
                                        <td>{{$index}}</td>
                                        <td>
                                            @foreach($barang as $barangg)
                                            @if($barangg->id == $item->nama_barang)
                                                {{ $barangg->judul }}
                                            @endif
                                            @endforeach
                                    </td>
                                            <td>
                                                {{$item->kuantitas}}
                                                @foreach($satuan as $satuans)
                                            @if($satuans->id == $item->satuan)
                                                {{ $satuans->nama }}
                                            @endif
                                        @endforeach
                                            </td>
                                        <td>
                                            <div class="btn-group">
                                                <a href="{{ route('isirak.edit', $item->id) }}?id_rak={{ $id_rak }}" class="me-1">
                                                <button type="submit" class="btn btn-primary"><i class="ri-edit-line"></i></button>
                                            </a>
                                            <form action="{{ route('isirak.destroy', $item->id) }}?id_rak={{ $id_rak }}" method="POST">
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
