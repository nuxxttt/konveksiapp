@extends('layouts.vertical', ['title' => 'Edit Barang', 'mode' => $mode ?? '', 'demo' => $demo ?? ''])

@section('content')
<div class="container">
    @include('layouts.shared/page-title', ['sub_title' => 'Edit Barang', 'page_title' => 'Edit Barang'])
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">

    <div class="card">
        <div class="card-body">
            <form method="POST" action="{{ route('produksi.update', $produksi->id) }}">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group mb-3">
                            <label for="product" class="form-label">Product:</label>
                            <input type="text" name="product" class="form-control" required value="{{ $produksi->product }}">
                        </div>
                    <div class="form-group mb-3">
                            <label for="jumlah" class="form-label">Jumlah:</label>
                            <input type="number" name="jumlah" class="form-control" required value="{{ $produksi->jumlah }}">
                        </div>
                        <div class="form-group mb-3">
                            <label for="mitra" class="form-label">Mitra:</label>
                            <select name="mitra" class="form-control" required>
                                <option value="" disabled selected>Select Mitra</option>
                                @foreach($mitras as $mitra)
                                    <option value="{{ $mitra->id }}">{{ $mitra->nama }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group mb-3">
                            <label for="status" class="form-label">Status:</label>
                            <input type="text" name="status" class="form-control" required value="{{ $produksi->status }}">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group mb-3">
                            <label for="mulai" class="form-label">Mulai:</label>
                            <input type="text" name="mulai" class="form-control datepicker" required value="{{ $produksi->mulai }}">
                        </div>
                        <div class="form-group mb-3">
                            <label for="deadline" class="form-label">Deadline:</label>
                            <input type="text" name="deadline" class="form-control datepicker" required value="{{ $produksi->deadline }}">
                        </div>
                    </div>
                </div>
                <div class="form-group mb-3">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>

        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<script>
    flatpickr(".datepicker", {
        enableTime: false, // You can customize datepicker options here
        dateFormat: "Y-m-d",
    });
</script>
@endsection
