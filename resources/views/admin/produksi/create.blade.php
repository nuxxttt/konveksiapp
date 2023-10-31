@extends('layouts.vertical', ['title' => 'Tambah Barang', 'mode' => $mode ?? '', 'demo' => $demo ?? ''])

@section('content')
<div class="container">
    @include('layouts.shared/page-title', ['sub_title' => 'Tambah Proses', 'page_title' => 'Tambah Proses'])
    <link rel="stylesheet" href="{{ asset('css/flatpickr.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <div class="card">
        <div class="card-body">
            <form method="POST" action="{{ route('produksi.store') }}">
                @csrf
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group mb-3">
                            <label for="product" class="form-label">Product:</label>
                            <select name="product" class="form-control select2" required>
                                @foreach($barang as $item)
                                    <option value="{{ $item->id }}">{{ $item->nama }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group mb-3">
                            <label for="jumlah" class="form-label">Jumlah:</label>
                            <input type="number" name="jumlah" class="form-control" required>
                        </div>
                        <div class="form-group mb-3">
                            <label for="mitra" class="form-label">Mitra:</label>
                            <select name="mitra" class="form-select" required>
                                @foreach($mitras as $mitra)
                                    <option value="{{ $mitra->id }}">{{ $mitra->nama }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group mb-3">
                            <label for="status" class="form-label">Status:</label>
                            <select name="keterangan" class="form-select" required>
                                <option value="Selesai">Selesai</option>
                                <option value="Pending">Pending</option>
                                <option value="Dikirim">Dikirim</option>
                    </select>                          </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group mb-3">
                            <label for="mulai" class="form-label">Mulai:</label>
                            <input type="text" name="mulai" class="form-control datepicker" required>
                        </div>
                        <div class="form-group mb-3">
                            <label for="deadline" class="form-label">Deadline:</label>
                            <input type="text" name="deadline" class="form-control datepicker" required>
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


<script src="{{ asset('js/flatpickr.js') }}"></script>
<script>
    flatpickr(".datepicker", {
        enableTime: false,
        dateFormat: "Y-m-d",
    });
    $(".select2").select2({
        placeholder: "Search for a product...",
        allowClear: true,
    });
</script>

@endsection
