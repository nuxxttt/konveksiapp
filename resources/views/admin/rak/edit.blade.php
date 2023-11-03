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
    <div class="row mt-xl-3">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="header-title">Formulir Edit Data Rak</h4>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('rak.update', $rak->id) }}">
                        @csrf
                        @method('PUT')

                        <div class="row g-2">
                            <div class="my-3 col-md-6">
                                <label for="nama" class="form-label">Nama</label>
                                <input type="text" required name="nama" id="nama" class="form-control" value="{{ $rak->nama }}">
                            </div>

                            <input type="hidden" value="{{ auth()->user()->id }}" name="id_user">

                            <div class="col-md-12">
                                <button type="submit" class="btn btn-primary mt-2">Update</button>
                            </div>
                        </div>
                    </form>
                </div> <!-- end card-body -->
            </div> <!-- end card -->
        </div><!-- end col -->
    </div>
    <!-- end row -->
@endsection