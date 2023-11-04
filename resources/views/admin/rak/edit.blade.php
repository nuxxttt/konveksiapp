@extends('layouts.vertical', ['title' => 'Edit Rak', 'mode' => $mode ?? '', 'demo' => $demo ?? ''])

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
        @include('layouts.shared/page-title', ['sub_title' => 'Rak', 'page_title' => 'Edit Rak'])

        <div class="card mx-auto"> <!-- Center align the card -->
            <div class="card-header">
                <h4 class="header-title">Formulir Edit Data Rak</h4>
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('rak.update', $rak->id) }}">
                    @csrf
                    @method('PUT')

                    <div class="g-2">
                        <div class="mb-3">
                            <label for="nama" class="form-label">Nama:</label>
                            <input type="text" name="nama" class="form-control" required value="{{ $rak->nama }}">
                        </div>

                        <input type="hidden" value="{{ auth()->user()->id }}" name="id_user">

                        <div class="col-md-12">
                            <button type="submit" class="btn btn-primary mt-2">Simpan</button>
                        </div>
                    </div>
                </form>
            </div> <!-- end card-body -->
        </div> <!-- end card -->
    </div>
@endsection
