@extends('layouts.vertical', ['title' => 'Tambahkan Konversi', 'mode' => $mode ?? '', 'demo' => $demo ?? ''])

@section('content')
<div class="container">
    @include('layouts.shared/page-title', ['sub_title' => 'Konversi', 'page_title' => 'Tambahkan Data Acuan Konversi'])
    @include('layouts.notification')
    <div class="card">
        <div class="card-body">
            <form method="POST" action="{{ route('konversi.store') }}">
                @csrf
                <div class="row">
                    <div class="col-lg-12">
                        <div class="c-form mb-3">
                            <input type="text" name="nama_konversi" id="nama_konversi" class="form-control" required hidden>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group mb-3">
                            <label for="satuan_id1" class="form-label">Satuan Asal:</label>
                            <select name="satuan_id1" id="satuan_id1" class="form-control" required>
                                <option value="" disabled selected>Pilih Satuan</option>
                                @foreach($satuan as $satuans)
                                    <option value="{{ $satuans->id }}" data-placeholder="{{ $satuans->nama }}">{{ $satuans->nama }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group mb-3">
                            <label for="hasil_id1" class="form-label">Kuantitas:</label>
                            <input type="number" name="hasil_id1" id="hasil_id1" class="form-control" required value="1">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group mb-3">
                            <label for="satuan_id2" class="form-label">Ke:</label>
                            <select name="satuan_id2" id="satuan_id2" class="form-control" required>
                                <option value="" disabled selected>Pilih Satuan</option>
                                @foreach($satuan as $satuans)
                                    <option value="{{ $satuans->id }}" data-placeholder="{{ $satuans->nama }}">{{ $satuans->nama }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group mb-3">
                            <label for="hasil_id2" class="form-label">Kuantitas:</label>
                            <input type="number" name="hasil_id2" id="hasil_id2" class="form-control" required placeholder="Masukkan Target disini">
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

<script>
document.addEventListener('DOMContentLoaded', function () {
    var satuanId1 = document.getElementById('satuan_id1');
    var satuanId2 = document.getElementById('satuan_id2');
    var hasil_id2 = document.getElementById('hasil_id2');
    var namaKonversi = document.getElementById('nama_konversi');

    function updatePlaceholder() {
        var selectedOption1 = satuanId1.options[satuanId1.selectedIndex];
        var selectedOption2 = satuanId2.options[satuanId2.selectedIndex];

        if (selectedOption1 && selectedOption2) {
            var placeholderText = "Masukkan Target " + selectedOption1.getAttribute('data-placeholder') + " ke " + selectedOption2.getAttribute('data-placeholder') + " disini";
            hasil_id2.placeholder = placeholderText;
            namaKonversi.value = selectedOption1.getAttribute('data-placeholder') + " ke " + selectedOption2.getAttribute('data-placeholder');
        } else {
            hasil_id2.placeholder = "Masukkan Target disini";
            namaKonversi.value = "";
        }
    }

    satuanId1.addEventListener('change', updatePlaceholder);
    satuanId2.addEventListener('change', updatePlaceholder);

    updatePlaceholder();
});
</script>

@endsection
