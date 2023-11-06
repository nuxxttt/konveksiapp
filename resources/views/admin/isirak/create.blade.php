@extends('layouts.vertical', ['title' => 'Tambah IsiRak', 'mode' => $mode ?? '', 'demo' => $demo ?? ''])
@php
    use App\Models\IsiRak;

    $itemsInIsiRak = IsiRak::pluck('nama_barang')->toArray(); // Get existing items in IsiRak
@endphp


@section('content')
<style>
    .card-body th {
        color: rgb(10, 10, 10);
    }

    .card-body td {
        color: rgb(10, 10, 10);
    }
</style>
<div class="container w-50">
    @include('layouts.shared/page-title', ['sub_title' => 'Master Data / Rak', 'page_title' => 'Tambah Isi Rak'])

    <div class="card mx-auto"> <!-- Center align the card -->
        <div class="card-header">
            <h4 class="header-title">Formulir Tambah Data Isi Rak</h4>
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('isirak.store') }}">
                @csrf
                <div class="g-2">
                    <div class="mb-3">
                        <label for="nama_barang" class="form-label">Nama Barang:</label>
                        <select name="nama_barang" id="nama_barang" class="form-control select2" required>
                            @foreach($barang as $barangg)
                                @if (!in_array($barangg->judul, $itemsInIsiRak))
                                    <option value="{{ $barangg->id }}">{{ $barangg->judul }}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                    <div class="my-3">
                        <label for="kuantitas" class="form-label">Kuantitas:</label>
                        <input type="text" required name="kuantitas" id="kuantitas" class="form-control">
                    </div>

                    <div class="mb-3">
                        <input type="hidden" name="id_rak" id="id_rak" class="form-control" value="{{ $id_rak }}">
                    </div>

                    <div class="col-md-12">
                        <button type="submit" class="btn btn-primary mt-2">Submit</button>
                    </div>
                </div>
            </form>
        </div> <!-- end card-body -->
    </div> <!-- end card -->
</div>


@endsection
