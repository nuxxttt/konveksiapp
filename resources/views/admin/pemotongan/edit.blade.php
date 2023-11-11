@extends('layouts.vertical', ['title' => 'Tambahkan Konversi', 'mode' => $mode ?? '', 'demo' => $demo ?? ''])

@section('content')
<div class="container">
    @include('layouts.shared/page-title', ['sub_title' => 'Konversi', 'page_title' => 'Tambah Konversi'])
    @include('layouts.notification')
    <div class="card">
        <div class="card-body">
            <form method="POST" action="{{ route('pemotongan.store') }}">
                @csrf
                <div class="row">
                    <div class="col-lg-12">
                        <div class="c-form mb-3">
                            <input type="text" name="satuan_id1" id="satuan_id1" class="form-control" required hidden value="{{$pemotongann->satuan_id1}}">
                            <input type="text" name="satuan_id2" id="satuan_id2" class="form-control" required hidden value="{{$pemotongann->satuan_id2}}">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group mb-3">
                            <label for="hasil_id1" class="form-label">
                                @foreach($satuans as $satuan)
                                @if($satuan->id == $pemotongann->satuan_id1)
                                    {{ $satuan->nama }}
                                @endif
                            @endforeach:</label>
                            <input type="number" name="hasil_id1" id="hasil_id1" class="form-control" required value="">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group mb-3">
                            <label for="hasil_id2" class="form-label">
                                @foreach($satuans as $satuan)
                                @if($satuan->id == $pemotongann->satuan_id2)
                                    {{ $satuan->nama }}
                                @endif
                            @endforeach:</label>
                            <input type="number" name="hasil_id2" id="hasil_id2" class="form-control" required placeholder="Hasil Target">
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
    var hasilId1 = document.getElementById('hasil_id1');
    var hasilId2 = document.getElementById('hasil_id2');

    hasilId1.addEventListener('input', function() {
        // Get the value of hasil_id1
        var value1 = parseFloat(hasilId1.value);

        // Get the constant value from $pemotongan->hasil_id2
        var constantValue1 = parseFloat("{{ $pemotongann->hasil_id1 }}");
        var constantValue = parseFloat("{{ $pemotongann->hasil_id2 }}");


        // Check if $pemotongan->hasil_id1 is less than $pemotongan->hasil_id2
        if (constantValue1 < constantValue) {
            // Calculate the result by multiplying
            hasilId2.value = isNaN(value1) ? '' : value1 * constantValue;
        } else if (constantValue1 > constantValue) {
            // Calculate the result by dividing
            hasilId2.value = isNaN(value1) ? '' : value1 / constantValue1;
        }
    });
});
</script>

@endsection
