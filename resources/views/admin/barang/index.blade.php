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
                        <h4 class="header-title">Daftar Barang</h4>
                        <div class="button mt-2">
                            <a href="{{ route('barang.create') }}" class="btn btn-primary rounded-pill">Tambah Data</a>
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
                                        <th>Category</th>
                                        <th>Supplier</th>
                                        <th>Kode Barang</th>
                                        <th>Harga Jual</th>
                                        <th>Harga Pokok</th>
                                        <th>Stok/Satuan</th>
                                        <th>Keterangan</th>
                                        <th>Status</th>
                                        <th>Created By</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($barangs as $barang)
                                    <tr>
                                        <td>{{ $barang->id }}</td>
                                        <td>{{ $barang->judul }}</td>
                                        <td>
                                            @foreach($kategorys as $kategori)
                                            @if($kategori->id == $barang->category_id)
                                                {{ $kategori->product }}
                                            @endif
                                        @endforeach
                                        </td>
                                        <td>
                                            @foreach($suppliers as $supplier)
                                                @if($supplier->id == $barang->supplier_id)
                                                    {{ $supplier->supplier }}
                                                @endif
                                            @endforeach
                                        </td>
                                        <td>{{ $barang->kode_barang }}</td>
                                        <td>{{ 'Rp. ' . number_format($barang->harga_jual, 2, ',', '.'); }}</td>
                                        <td>{{ 'Rp. ' . number_format($barang->harga_pokok, 2, ',', '.'); }}</td>
                                        <td>{{ $barang->stok }}
                                        @foreach($satuans as $satuan)
                                            @if($satuan->id == $barang->satuan)
                                                {{ $satuan->nama }}
                                            @endif
                                        @endforeach</td>
                                        <td>{{ $barang->keterangan }}</td>
                                        <td><?php
                                            if ($barang->status == 'Tersedia') {
                                                echo '<span class="badge bg-info-subtle text-info">' . $barang->status . '</span>';
                                            } elseif ($barang->status == 'Dibatalkan') {
                                                echo '<span class="badge bg-pink-subtle text-pink">' . $barang->status . '</span>';
                                            }
                                            ?>
                                            </td>
                                            <td>
                                                @foreach($user as $users)
                                                @if($users->id == $barang->created_by)
                                                    {{ $users->name }}
                                                @endif
                                            @endforeach</td>
                                        <td>
                                            <div class="btn-group">
                                                <a href="{{ route('barang.edit', $barang->id) }}" class="me-1 ">
                                                    <button type="submit" class="btn btn-primary rounded-pill"><i class="ri-edit-line"></i></button>
                                                </a>

                                                <form action="{{ route('barang.destroy', $barang->id) }}" method="POST">
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
    'resources/js/pages/responsive-table.init.js',])
@endsection
