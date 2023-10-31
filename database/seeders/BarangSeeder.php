<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Barang;

class BarangSeeder extends Seeder
{
    public function run()
    {
        // Data dummy untuk tabel Barang
        $barangs = [
            [
                'uuid' => 'ABC123',
                'category_id' => 1,
                'supplier_id' => 1,
                'kode_barang' => 'B001',
                'harga_jual' => 100.00,
                'harga_pokok' => 75.00,
                'stok' => 50,
                'judul' => 'Barang pertama',
                'status' => 'Tersedia',
            ],
            [
                'uuid' => 'DEF456',
                'category_id' => 2,
                'supplier_id' => 2,
                'kode_barang' => 'B002',
                'harga_jual' => 120.00,
                'harga_pokok' => 90.00,
                'stok' => 75,
                'judul' => 'Barang kedua',
                'status' => 'Tersedia',
            ],
            // Tambahkan data dummy lainnya sesuai kebutuhan
        ];

        foreach ($barangs as $barang) {
            Barang::create($barang);
        }
    }
}
