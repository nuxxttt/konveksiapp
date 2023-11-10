<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Laporan Penjualan</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }

        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>

    <h2>{{$title}}</h2>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama Produk</th>
                <th>Category</th>
                <th>Harga Pokok</th>
                <th>Harga Jual</th>
                <th>Kuantitas</th>
                <th>Tanggal</th>
            </tr>
        </thead>
        <tbody>
            @foreach($data as $dataa)
            <tr>
                <td>{{ $dataa->id }}</td>
                <td>
                    @foreach($barangs as $barang)
                    @if($barang->kode_barang == $dataa->kode_barang)
                        {{ $barang->judul }}
                    @endif
                    @endforeach</td>
                <td>
                    @foreach($kategorys as $kategori)
                    @if($kategori->id == $dataa->category_id)
                        {{ $kategori->product }}
                    @endif
                    @endforeach
                </td>
                <td>{{ 'Rp. ' . number_format($dataa->harga_pokok, 2, ',', '.'); }}</td>
                <td>{{ 'Rp. ' . number_format($dataa->harga_jual, 2, ',', '.'); }}</td>
                <td>{{ $dataa->stok }}</td>
                <td>{{ $dataa->created_at->setTimezone('Asia/Jakarta')->format('Y-m-d / H:i') }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

</body>
</html>
