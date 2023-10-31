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
                <h4 class="header-title">Daftar Proses Produksi</h4>
                <div class="button mt-2">
                    <a href="{{ route('produksi.create') }}" class="btn btn-primary rounded-pill">Tambah Data</a>
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
                                        <th>Jumlah</th>
                                        <th>Tanggal Mulai</th>
                                        <th>Deadline</th>
                                        <th>Status</th>
                                        <th>Mitra</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($produksi as $produksi)
                                    <tr>
                                        <td>{{ $produksi->id }}</td>
                                        <td>{{ $produksi->product }}</td>
                                        <td>{{ $produksi->jumlah }}</td>
                                        <td>{{ $produksi->mulai }}</td>
                                        <td>{{ $produksi->deadline }}</td>
                                        <td><?php
                                            if ($produksi->status == 'Tersedia') {
                                                echo '<span class="badge bg-info-subtle text-info">' . $produksi->status . '</span>';
                                            } elseif ($produksi->status == 'Dibatalkan') {
                                                echo '<span class="badge bg-pink-subtle text-pink">' . $produksi->status . '</span>';
                                            }
                                            ?>
                                            </td>
                                        <td>                    @foreach($mitras as $mitra)
                                            @if($mitra->id == $produksi->mitra)
                                                {{ $mitra->nama }}
                                            @endif
                                        @endforeach</td>

                                        <td>
                                            <div class="btn-group">
                                                <a href="{{ route('produksi.edit', $produksi->id) }}" class="me-1 ">
                                                    <button type="submit" class="btn btn-primary rounded-pill"><i class="ri-edit-line"></i></button>
                                                </a>

                                                <form action="{{ route('produksi.destroy', $produksi->id) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger rounded-pill"><i class="ri-delete-bin-6-line"></i></button>
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
    'resources/js/pages/responsive-table.init.js',
])
@endsection
