@extends('layouts.vertical', ['title' => 'Event', 'mode' => $mode ?? '', 'demo' => $demo ?? ''])

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
        use App\Models\EventModel;
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
    <div class="container-fluid">
        <div class="row g-3 mt-xl-3 align-items-center justify-content-center">
            @php
                $data = EventModel::all();
            @endphp
            @foreach ($data as $item)
            <div class="col-sm-4 col-lg-4">
                @php
                    // Tanggal awal dan akhir dalam format Y-m-d
                    $tanggal_awal = $item->tanggal_mulai;
                    $tanggal_akhir = $item->tanggal_selesai;

                    // Mengonversi tanggal awal dan akhir ke format yang diinginkan
                    $tanggal_awal_format = date("j F", strtotime($tanggal_awal));
                    $tanggal_akhir_format = date("j F Y", strtotime($tanggal_akhir));

                    // Menggabungkan dalam format yang diinginkan
                    $hasil_konversi = $tanggal_awal_format . " - " . $tanggal_akhir_format;

                @endphp
                <!-- Simple card -->
                <div class="card d-block justify-content-center  border-primary border">
                    <img class="card-img-top" src="/{{$item->img}}" alt="Card image cap">
                    <div class="card-body">
                        <h4 class="card-title text-center" style="color:#282f3a">{{$item->name}}</h4>
                        <h6 class="card-text text-center">{{$hasil_konversi}}</h6>
                        <p class="card-text">
                        <br>
                        Max Perserta :{{$item->max_perserta}} <br>
                        Status :{{$item->status}} <br>
                        Catatan :{{$item->catatan}}
                        </p>
                        <a href="javascript: void(0);" class="btn btn-primary">Comming Soon</a>
                    </div> <!-- end card-body-->
                </div> <!-- end card-->
            </div><!-- end col -->
            @endforeach
        </div>
    </div>
<!-- end row-->

@endsection
@section('script')
@vite([
    'resources/js/pages/datatable.init.js',
    'resources/js/pages/responsive-table.init.js',])
@endsection