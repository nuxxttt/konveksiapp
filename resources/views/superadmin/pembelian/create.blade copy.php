@extends('layouts.vertical', ['title' => 'Tambah Barang', 'mode' => $mode ?? '', 'demo' => $demo ?? ''])

@section('content')
<div class="container">
    @include('layouts.shared/page-title', ['sub_title' => 'Penjualan', 'page_title' => 'Tambah Penjualan'])

    <div class="card">
        <div class="card-body">
            <form method="POST" action="{{ route('barang.store') }}">
                @csrf
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group mb-3">
                            <label for="judul" class="form-label">Judul:</label>
                            <select class="select2 form-select" id="judulSelector" name="judul" id="product-name-input">
                                <option value="">Pilih barang</option>
                            </select>
                        </div>
                        <div class="form-group mb-3">
                            <label for="category" class="form-label">Kategori:</label>
                            <input type="text" class="category form-control" name="category" required>
                        </div>
                        <div class="form-group mb-3">
                            <label for="supplier" class="form-label">Supplier:</label>
                            <input type="text" class="supplier  form-control" name="supplier" required>
                        </div>
                        <div class="detail"></div>
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
<style>
    .logo-lg {
        display: none;
    }
    .logo-dark {
        display: none;
    }
</style>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
<link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css" />
<script>
    var jsonData = null;

    function filterAndDisplayData() {
        var selectedJudul = $('#judulSelector').val();

        var selectedItem = jsonData.data.find(function(item) {
            return item.judul === selectedJudul;
        });

        if (selectedItem) {
            var detailDiv = $('.detail');
            var categoryInput = $('.category');
            var supplierInput = $('.supplier');
            detailDiv.empty();
            detailDiv.append('<p>Harga: ' + selectedItem.harga_jual + '</p>');

            getCategoryName(selectedItem.category_id).then(function(categoryName) {
                categoryInput.val(categoryName);
            });

            getSupplierName(selectedItem.supplier_id).then(function(supplierName) {
                supplierInput.val(supplierName);
            });

            detailDiv.append('<p>Harga Pokok: ' + selectedItem.harga_pokok + '</p>');
            detailDiv.append('<p>Stok Tersisa: ' + selectedItem.stok + '</p>');
        }
    }

    function getCategoryName(categoryId) {
        return new Promise(function(resolve, reject) {
            $.ajax({
                url: 'http://127.0.0.1:8000/api/kategori/' + categoryId,
                type: 'GET',
                dataType: 'json',
                success: function(data) {
                    resolve(data.product);
                },
                error: function(error) {
                    reject(error);
                }
            });
        });
    }

    function getSupplierName(supplierId) {
        return new Promise(function(resolve, reject) {
            $.ajax({
                url: 'http://127.0.0.1:8000/api/supplier/' + supplierId,
                type: 'GET',
                dataType: 'json',
                success: function(data) {
                    resolve(data.supplier);
                },
                error: function(error) {
                    reject(error);
                }
            });
        });
    }

    $(document).ready(function() {
        $('#judulSelector').select2();

        $.ajax({
            url: '/api/barang',
            type: 'GET',
            dataType: 'json',
            success: function(data) {
                var judulSelector = $('#judulSelector');
                jsonData = data;
                $.each(data.data, function(index, item) {
                    judulSelector.append($('<option>', {
                        value: item.judul,
                        text: item.judul
                    }));
                });

                judulSelector.on('change', filterAndDisplayData);
            }
        });
    });
</script>
