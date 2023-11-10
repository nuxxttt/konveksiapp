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
                <th>Product</th>
                <th>Jumlah</th>
                <th>Tanggal Mulai</th>
                <th>Deadline</th>
                <th>Status</th>
                <th>Mitra</th>
            </tr>
        </thead>
        <tbody>
            @foreach($produksi as $produksi)
            @if ($produksi->status == 'Selesai')
            <tr>
                <td>{{ $produksi->id }}</td>
                <td>
                    @foreach($barang as $barangg)
                    @if($barangg->id == $produksi->product)
                        {{ $barangg->judul }}
                    @endif
                @endforeach</td>
                <td>{{ $produksi->jumlah }}</td>
                <td>{{ $produksi->mulai }}</td>
                <td>{{ $produksi->deadline }}</td>
                <td>{{$produksi->status}}</td>

                <td>
                    @foreach($mitras as $mitra)
                    @if($mitra->id == $produksi->mitra)
                        {{ $mitra->nama }}
                    @endif
                @endforeach</td>
            </tr>
            @endif
            @endforeach
        </tbody>
    </table>

</body>
</html>
