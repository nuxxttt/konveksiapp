@extends('layouts.vertical', ['title' => 'Tambah Mitra', 'mode' => $mode ?? '', 'demo' => $demo ?? ''])

@section('content')
<div class="container c-form">
    @include('layouts.shared/page-title', ['sub_title' => 'Mitra', 'page_title' => 'Tambah Mitra'])

    <div class="card mx-auto"> <!-- Center align the card -->
        <div class="card-body">
            <form method="POST" action="{{ route('mitra.store') }}">
                @csrf
                <div class="g-2">

                    <!-- Nama Mitra -->
                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama Mitra:</label>
                        <input type="text" name="nama" class="form-control" required>
                    </div>

                    <!-- Alamat -->
                    <div class="mb-3">
                        <label for="alamat" class="form-label">Alamat:</label>
                        <input type="text" name="alamat" class="form-control" required>
                    </div>

                    <!-- Nomor Telepon -->
                    <div class="mb-3">
                        <label for="phone" class="form-label">Nomor Telepon:</label>
                        <input type="text" name="phone" class="form-control" required>
                    </div>

                    <div class="col-md-12">
                        <button type="submit" class="btn btn-primary mt-2">Simpan</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
