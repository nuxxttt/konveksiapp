@extends('layouts.vertical', ['title' => 'Edit Proses', 'mode' => $mode ?? '', 'demo' => $demo ?? ''])

@section('content')
<div class="container">
    @include('layouts.shared/page-title', ['sub_title' => 'Edit Proses', 'page_title' => 'Edit Proses'])
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">

    <div class="card">
        <div class="card-body">
            <form method="POST" action="{{ route('produksi.update', $produksi->id) }}">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group mb-3">
                            <label for="product" class="form-label">Produk:</label>
                            <select name="product" class="form-control" required>
                            @foreach($barang as $barangg)
                            @if($produksi->product == $barangg->judul)
                                <option value="{{ $produksi->product }}" selected>{{ $barangg->judul }}</option>
                            @else
                                <option value="{{ $produksi->product }}">{{ $barangg->judul }}</option>
                            @endif
                        @endforeach
                            </select>
                        </div>
                        <div class="form-group mb-3">
                            <label for="jumlah" class="form-label">Jumlah:</label>
                            <input type="number" name="jumlah" class="form-control" required value="{{ $produksi->jumlah }}">
                        </div>
                        <div class="form-group mb-3">
                            <label for="mitra" class="form-label">Mitra:</label>
                            <select name="mitra" class="form-control" required>
                                @foreach($mitras as $mitra)
                                    <option value="{{ $mitra->id }}" {{ $produksi->mitra == $mitra->id ? 'selected' : '' }}>{{ $mitra->nama }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group mb-3">
                            <label for="status" class="form-label">Status:</label>
                            <select name="status" class="form-control" required>
                                <option value="Selesai">Selesai</option>
                                <option value="Pending">Pending</option>
                                <option value="Dikirim">Dikirim</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group mb-3">
                            <label for="mulai" class="form-label">Tanggal Mulai:</label>
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
        enableTime: false,
        dateFormat: "Y-m-d",
    });
</script>
@endsection
