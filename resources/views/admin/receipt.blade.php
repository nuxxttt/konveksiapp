<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Receipt</title>
</head>
<body>
    <h1>Receipt</h1>

    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>Kode Barang</th>
                <th>Category ID</th>
                <!-- Add other table headers -->
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $item)
                <tr>
                    <td>{{ $item['id'] }}</td>
                    <td>{{ $item['kode_barang'] }}</td>
                    <td>{{ $item['category_id'] }}</td>
                    <!-- Add other table cells -->
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
