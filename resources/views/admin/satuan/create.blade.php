@extends('layouts.vertical', ['title' => 'Tambah Rak', 'mode' => $mode ?? '', 'demo' => $demo ?? ''])

@section('content')
    <style>
        .card-body th {
            color: rgb(10, 10, 10);
        }
        .card-body td {
            color: rgb(10, 10, 10);
        }
    </style>
    <div class="container c-form">
        @include('layouts.shared/page-title', ['sub_title' => 'Rak', 'page_title' => 'Tambah Rak'])

        <div class="card mx-auto"> <!-- Center align the card -->
            <div class="card-body">
                <form method="POST" action="{{ route('satuan.store') }}">
                    @csrf
                    <div class="g-2">
                        <div class="mb-3">
                            <label for="nama" class="form-label">Nama:</label>
                            <input type="text" name="nama" class="form-control" required>
                        </div>


                        <div class="col-md-12">
                            <button type="submit" class="btn btn-primary mt-2">Simpan</button>
                        </div>
                    </div>
                </form>
            </div> <!-- end card-body -->
        </div> <!-- end card -->
    </div>
@endsection
