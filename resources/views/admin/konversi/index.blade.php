<!DOCTYPE html>
<html>
<head>
    <title>Konversi Satuan</title>
</head>
<body>
    <h1>Konversi Satuan</h1>
    <form method="post" action="/konversi">
        @csrf
        <label for="input_unit">Pilih Satuan:</label>
        <select name="input_unit" id="input_unit">
            <option value="lusin" {{ $input_unit === 'lusin' ? 'selected' : '' }}>Lusin</option>
            <option value="kodi" {{ $input_unit === 'kodi' ? 'selected' : '' }}>Kodi</option>
            <option value="gross" {{ $input_unit === 'gross' ? 'selected' : '' }}>Gross</option>
        </select>
        <br>
        <label for="jumlah_barang">Masukkan jumlah dalam {{ $input_unit }}:</label>
        <input type="number" name="jumlah_barang" id="jumlah_barang" value="{{ $jumlah_barang }}">
        <br>
        <button type="submit">Hitung Konversi</button>
    </form>

    <p>{{ $jumlah_barang }} {{ $input_unit }} = {{ $satuan_lusin }} lusin</p>
    <p>{{ $jumlah_barang }} {{ $input_unit }} = {{ $satuan_kodi }} kodi</p>
    <p>{{ $jumlah_barang }} {{ $input_unit }} = {{ $satuan_gross }} gross</p>
</body>
</html>
