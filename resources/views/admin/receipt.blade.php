@php
    use App\Models\Mitra;
    use App\Models\Barang;
    use App\Models\Supplier;
    $mitras = Mitra::all();
    $barangs = Barang::all();
    $suppliers = Supplier::all();
@endphp
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
<style>
body {
  font-family: Arial, sans-serif;
  margin: 0;
  padding: 0;
}

.receipt {
  max-width: 600px;
  margin: 50px auto;
  padding: 20px;
}

header {
  text-align: center;
}

footer {
  text-align: center;
}

.customer-info,
.order-details,
.total {
  margin-top: 20px;
}

table {
  width: 100%;
  border-collapse: collapse;
  margin-top: 10px;
}

th, td {
  border: 1px solid #ddd;
  padding: 8px;
  text-align: left;
}

th {
  background-color: #f2f2f2;
}

h2 {
  border-bottom: 1px solid #ccc;
  padding-bottom: 5px;
}

h3 {
  border-bottom: 1px solid #ccc;
  padding-bottom: 5px;
}

h4 {
  border-bottom: 1px solid #ccc;
  padding-bottom: 5px;
}

h4 {
  border-bottom: 1px solid #ccc;
  padding-bottom: 5px;
}


h1, h2 {
  color: #333;
}

</style>  <title>Receipt</title>
</head>
<body>
  <div class="receipt">
    <header>
      <h1>
        {{ $title }}</h1>
    </header>
    <section class="customer-info">
      <h4>Pemesanan Tanggal:</h4>
      @if ($data && $data->first())
      <p>{{ $data->first()->created_at->setTimezone('Asia/Jakarta')->format('Y-m-d / H:i') }}</p>
  @endif
      </section>
    <section class="order-details">
      <h3>Order Details</h3>
      @php
      $totalHargaJual = 0;
  @endphp
      <table>
        <thead>
          <tr>
            <th>Produk</th>
            <th>Kuantitas</th>
            <th>Harga</th>
            <th>Total</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($data as $datas)
            <tr>
                <td>
                    @foreach($barangs as $barang)
                        @if($barang->kode_barang == $datas->kode_barang)
                            {{ $barang->judul }}
                        @endif
                    @endforeach
                </td>
                <td>{{ $datas->stok }}</td>
                <td>{{ 'Rp. ' . number_format($datas->harga_pokok, 2, ',', '.'); }}</td>
                <td>{{ 'Rp. ' . number_format($datas->harga_jual, 2, ',', '.'); }}</td>
                @php
                    $totalHargaJual += $datas->harga_jual;
                @endphp
            </tr>
        @endforeach
        </tbody>
      </table>
    </section>
    <section class="total">
        <h4><strong>Harga Total : </strong>{{ 'Rp. ' . number_format($totalHargaJual, 2, ',', '.'); }}</h4>
    </section>
  </div>
  <footer>
          <small>
        @if(isset($settings) && $settings->title)
        {{$settings->title}}
         @else
         Nustra Studio
         @endif</small>
  </footer>
</body>
</html>

