@extends('layouts.vertical', ['title' => 'Tambah IsiRak', 'mode' => $mode ?? '', 'demo' => $demo ?? ''])

@section('content')
    <style>
        .card-body th {
            color: rgb(10, 10, 10);
        }
        .card-body td {
            color: rgb(10, 10, 10);
        }
    </style>
    <div class="row mt-xl-3">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="header-title">Formulir Tambah Data Isi Rak</h4>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('isirak.store') }}">
                        @csrf
                        <div class="row g-2">


                            <div class="my-3 col-md-6">
                                <label for="nama_barang" class="form-label">Nama Barang</label>
                                <input type="text" required name="nama_barang" id="nama_barang" class="form-control">
                            </div>

                            <div class="my-3 col-md-6">
                                <input type="hidden" type="text" name="id_rak" id="id_rak" class="form-control" value="{{ $id_rak }}">
                            </div>

                            <div class="col-md-12">
                                <button type="submit" class="btn btn-primary mt-2">Submit</button>
                            </div>
                        </div>
                    </form>
                </div> <!-- end card-body -->
            </div> <!-- end card -->
        </div><!-- end col -->
    </div>
    <!-- end row -->
@endsection
