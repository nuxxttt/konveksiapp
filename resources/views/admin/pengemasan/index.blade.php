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
    use App\Models\Barang;
    use App\Models\Satuan;
    $satuans = Satuan::all();
    use App\Models\User;
    $user = User::all();
@endphp
@section('content')
<div class="row mt-xl-3">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-md-6">
                        <div class="button mt-2">
                            <a href="{{ route('pengemasan.create') }}" class="btn btn-primary rounded-pill">Tambah Pengemasan</a>
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
                                        <th>ID</th>
                                        <th>Product</th>
                                        <th>Kode Barang</th>
                                        <th>Harga Pokok</th>
                                        <th>Harga Jual</th>
                                        <th>Kuantitas</th>
                                        <th>Created By</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($pengemasan as $pengemasans)
                                    <tr>
                                        <td>{{ $pengemasans->id }}</td>
                                        <td>{{ $barang = Barang::where('kode_barang', $pengemasans->kode_barang)->first()->judul;
                                        }}</td>
                                        <td>{{ $barang = Barang::where('kode_barang', $pengemasans->kode_barang)->first()->kode_barang;
                                        }}</td>
                                        <td>{{ $barang = Barang::where('kode_barang', $pengemasans->kode_barang)->first()->harga_pokok;
                                        }}</td>
                                        <td>{{ $barang = Barang::where('kode_barang', $pengemasans->kode_barang)->first()->harga_jual;
                                        }}</td>
                                        <td>{{$pengemasans->kuantitas}} @foreach($satuans as $satuan)
                                            @if($satuan->id == Barang::where('kode_barang', $pengemasans->kode_barang)->first()->satuan)
                                                {{ $satuan->nama }}
                                            @endif
                                        @endforeach</td>
                                        <td>
                                            @foreach($user as $users)
                                            @if($users->id == $pengemasans->created_by)
                                                {{ $users->name }}
                                            @endif
                                        @endforeach</td>
                                        <td>
                                            <span class="badge bg-info-subtle text-info">Siap Jual</span>
                                        </td>
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
