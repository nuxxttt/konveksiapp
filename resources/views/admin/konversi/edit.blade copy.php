@extends('layouts.vertical', ['title' => 'Edit Mitra', 'mode' => $mode ?? '', 'demo' => $demo ?? ''])

@section('content')
<div class="container c-form">
    @include('layouts.shared/page-title', ['sub_title' => 'Mitra', 'page_title' => 'Edit Mitra'])

    <div class="card mx-auto"> <!-- Center align the card -->
        <div class="card-body">
            <form method="POST" action="{{ route('distribusi.create') }}">
                @csrf
                @method('PUT')

                <!-- Nama Mitra -->
                <div class="mb-3">
                    <label for="nama" class="form-label">Nama Mitra:</label>
                    <input type="text" name="nama" class="form-control" required value="{{ $mitra->nama }}">
                </div>

                <!-- Alamat -->
                <div class="mb-3">
                    <label for="alamat" class="form-label">Alamat:</label>
                    <input type="text" name="alamat" class="form-control" required value="{{ $mitra->alamat }}">
                </div>

                <!-- Nomor Telepon -->
                <div class="mb-3">
                    <label for="phone" class="form-label">Nomor Telepon:</label>
                    <input type="text" name="phone" class="form-control" required value="{{ $mitra->phone }}">
                </div>

                <div class="">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
