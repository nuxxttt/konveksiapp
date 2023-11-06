@extends('layouts.vertical', ['title' => 'Tambah Barang', 'mode' => $mode ?? '', 'demo' => $demo ?? ''])

@section('content')
<div class="container">
    @include('layouts.shared/page-title', ['sub_title' => 'Barang', 'page_title' => 'Tambah Barang'])

    <div class="card">
        <div class="card-body">
            <form method="POST" action="{{ route('barang.store') }}">
                @csrf
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group mb-3">
                            <label for="judul" class="form-label">Judul:</label>
                            <select class="select2 form-select" id="judulSelector" name="judul" id="product-name-input">
                            </select>
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
@endsection
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
<link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css" />
<script>
    var jsonData = null;

    function filterAndDisplayData() {
        var selectedJudul = $('#judulSelector').val();

        // Filter the data based on the selected judul
        var filteredResults = jsonData.data.filter(function(item) {
            return (selectedJudul === "" || item.judul === selectedJudul);
        });

        // Display the filtered results
        var resultDiv = $('#result');
        resultDiv.empty();
        $.each(filteredResults, function(index, item) {
            resultDiv.append('<p>' + JSON.stringify(item) + '</p>');
        });
    }

    $(document).ready(function() {
        // Initialize the Select2 plugin for the judul select element
        $('#judulSelector').select2();

        // Populate the judul select element from the remote API
        $.ajax({
            url: 'http://127.0.0.1:8000/api/barang',
            type: 'GET',
            dataType: 'json',
            success: function(data) {
                jsonData = data;

                var judulSelector = $('#judulSelector');

                // Extract unique judul from the data
                var judul = [];

                $.each(data.data, function(index, item) {
                    if (judul.indexOf(item.judul) === -1) {
                        judul.push(item.judul);
                    }
                });

                // Populate the judul select element
                judulSelector.append($('<option>', {
                    value: "",
                    text: "All Pilih Barang"
                }));
                $.each(judul, function(index, item) {
                    judulSelector.append($('<option>', {
                        value: item,
                        text: item
                    }));
                });

                // Handle the change event of the judul select element
                judulSelector.on('change', filterAndDisplayData);

                // Initially display all data
                filterAndDisplayData();
            }
        });
    });
</script>
