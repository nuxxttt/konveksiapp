@extends('layouts.vertical', ['title' => 'Tambah Mitra', 'mode' => $mode ?? '', 'demo' => $demo ?? ''])

@section('content')

<div class="row mt-xl-3">
    @include('layouts.shared/page-title', ['sub_title' => 'Tambah Mitra', 'page_title' => 'Tambah Mitra'])
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4 class="header-title">Formulir Tambah Data Mitra</h4>
            </div>
            <div class="card-body">
                        <form method="POST" action="{{ route('mitra.store') }}">
                            @csrf
                            <div class="g-2">
                                <div class="form-group my-3 w-50">
                                    <label for="nama" class="form-label">Nama Mitra:</label>
                                    <input type="text" name="nama" class="form-control" required>
                                </div>
                                <div class="form-group my-3 w-50">
                                    <label for="phone" class="form-label">Nomor Telepon:</label>
                                    <input type="text" name="phone" class="form-control" required>
                                </div>
                                <div class="form-group my-3 w-50">
                                    <label for="keterangan" class="form-label">Keterangan:</label>
                                    <input type="text" name="keterangan" class="form-control" required>
                                </div>

                            <div class="col-md-12">
                                <button type="submit" class="btn btn-primary mt-2">Submit</button>
                            </div>
                        </div>
                        </form>


                <!-- end row-->
            </div> <!-- end card-body -->
        </div> <!-- end card -->
    </div><!-- end col -->
</div>

@endsection
