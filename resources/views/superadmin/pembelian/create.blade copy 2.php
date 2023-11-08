@extends('layouts.vertical', ['title' => 'Tambah Barang', 'mode' => $mode ?? '', 'demo' => $demo ?? ''])

@section('content')
<div class="container">
    @include('layouts.shared/page-title', ['sub_title' => 'Penjualan', 'page_title' => 'Tambah Penjualan'])

    <div class="card">
        <div class="card-body">
            <form method="POST" action="">
                @csrf
                <div class="row">
                    <div class="col-md-6">
<!-- Add this HTML code inside your form -->
                        <div class="form-group mb-3">
                            <label for="judul" class="form-label">Judul:</label>
                            <select class="select2 form-select" id="judulSelector" name="judul" id="product-name-input">
                                <option value="">Pilih barang</option>
                            </select>
                        </div>
                        <div class="form-group mb-3">
                            <label for="supplier" class="form-label">Jumlah:</label>
                            <input type="text" class="jml form-control" name="supplier" required>
                        </div>
                        <div class="form-group mb-3">
                            <label for="category" class="form-label">Kategori:</label>
                            <input type="text" class="category form-control" name="category" required>
                        </div>
                        <div class="form-group mb-3">
                            <label for="supplier" class="form-label">Supplier:</label>
                            <input type="text" class="supplier form-control" name="supplier" required>
                        </div>
                        <div class="form-group mb-3">
                            <!-- Display the selected "Judul" here -->
                            <label for="selected-judul" class="form-label">Selected Judul:</label>
                            <span id="selectedJudul"></span>
                        </div>

                    </div>
                    <div class="col-md-6">
                        <div class="form-group mb-3">
                            <label for="kode_produk" class="form-label">Kode Produk:</label>
                            <input type="text" class="kode_produk form-control" name="kode_produk" required>
                        </div>
                        <div class="form-group mb-3">
                            <label for="satuan" class="form-label">Harga Satuan:</label>
                            <input type="text" class="satuan form-control" name="satuan" required>
                        </div>
                        <div class="form-group mb-3">
                            <label for="total" class="form-label">Harga Total:</label>
                            <input type="text" class="total form-control" name="total" required>
                        </div>
                    </div>
                    <div class="form-group mb-3">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <!-- Add a span element to display the selected "Judul" -->
                        <span id="selectedJudul"></span>

                        <table id="temporary-table" class="table">
                            <thead>
                                <tr>
                                    <th>Judul</th>
                                    <th>Jumlah</th>
                                    <th>Kategori</th>
                                    <th>Supplier</th>
                                    <th>Kode Produk</th>
                                    <th>Harga Satuan</th>
                                    <th>Harga Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- Stacked data rows will be inserted here -->
                            </tbody>
                        </table>
                    </div>
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
    var selectedJudul = null;

    function filterAndDisplayData() {
        var selectedItem = jsonData.data.find(function(item) {
            return item.judul == selectedJudul;
        });

        if (selectedItem) {
            var detailDiv = $('.detail');
            var categoryInput = $('.category');
            var supplierInput = $('.supplier');
            var satuan = $('.satuan');
            var kode_produk = $('.kode_produk');
            var total = $('.total');
            var jml = $('.jml').val();

            detailDiv.empty();
            var harga = parseInt(selectedItem.harga_jual);

            getCategoryName(selectedItem.category_id).then(function(categoryName) {
                categoryInput.val(categoryName);
            });

            getSupplierName(selectedItem.supplier_id).then(function(supplierName) {
                supplierInput.val(supplierName);
            });

            satuan.val(harga);
            kode_produk.val(selectedItem.kode_barang);
            if (jml) {
                var totalHarga = harga * parseInt(jml);
                total.val(totalHarga);
            }
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
        var judulSelector = $('#judulSelector');
        var inputFields = $('.form-control');
        var temporaryTable = $('#temporary-table');

        $.ajax({
            url: '/api/barang',
            type: 'GET',
            dataType: 'json',
            success: function(data) {
                jsonData = data;
                $.each(data.data, function(index, item) {
                    judulSelector.append($('<option>', {
                        value: item.judul,
                        text: item.judul
                    }));
                });

                judulSelector.on('change', function() {
                    selectedJudul = $('.select2').val();
                    filterAndDisplayData();
                });

                $('.jml').on('input', function() {
                    filterAndDisplayData();
                });

                // Handle form submission
                $('form').on('submit', function(event) {
                    event.preventDefault();

                    // Save input data to the temporary table
                    var rowData = [];
                    inputFields.each(function(index, input) {
                        var value = $(input).val();
                        rowData.push(value);
                    });

                    // Add the selected "Judul" value to the data
                    rowData.unshift($('#selectedJudul').val());

                    var row = $('<tr></tr>');
                    rowData.forEach(function(value) {
                        row.append($('<td>' + value + '</td>'));
                    });
                    temporaryTable.find('tbody').append(row);

                    // Clear input fields and the selected "Judul"
                    inputFields.val('');
                    $('#selectedJudul').text('');
                });
            }
        });
    });
</script>
