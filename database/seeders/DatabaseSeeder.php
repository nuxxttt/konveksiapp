<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Models\Barang;
use App\Models\Category;
use App\Models\Mitra;
use App\Models\Supplier;
use App\Models\satuan;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        \App\Models\User::factory(1)->create([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'email_verified_at' => now(),
            'password' => '$2y$10$oix4RQtzAvReu6VQBR.RHOFxPcHFQZ6e/yKqQuIii.A.m9fkTbyA.',
            'remember_token' => Str::random(10),
            'role'=> "admin"
        ]);
        \App\Models\User::factory(1)->create([
            'name' => 'superadmin',
            'email' => 'superadmin@gmail.com',
            'email_verified_at' => now(),
            'password' => '$2y$10$oix4RQtzAvReu6VQBR.RHOFxPcHFQZ6e/yKqQuIii.A.m9fkTbyA.',
            'remember_token' => Str::random(10),
            'role'=> "superadmin"

        ]);
        $barangs = [
            [
                'uuid' => 'ABC123',
                'category_id' => 1,
                'supplier_id' => 1,
                'kode_barang' => 'B001',
                'harga_jual' => 10000,
                'harga_pokok' => 7500,
                'stok' => 50,
                'judul' => 'Barang pertama',
                'status' => 'Tersedia',
                'keterangan' => 'Barang Masuk',
                'satuan' => 1,
            ],
            [
                'uuid' => 'DEF456',
                'category_id' => 1,
                'supplier_id' => 1,
                'kode_barang' => 'B002',
                'harga_jual' => 12000,
                'harga_pokok' => 9000,
                'stok' => 75,
                'judul' => 'Barang kedua',
                'status' => 'Tersedia',
                'keterangan' => 'Dari Client',
                'satuan' => 1,
            ],
            // Tambahkan data dummy lainnya sesuai kebutuhan
        ];

        foreach ($barangs as $barang) {
            Barang::create($barang);
        };

        $kategorys = [
            ['product' => 'Kaos Partai',],
            ['product' => 'Baju Batik',],
        ];
        foreach ($kategorys as $kategori) {
            Category::create($kategori);
        };

        $satuans = [
            ['nama' => 'kodi',],
            ['nama' => 'roll',],
        ];
        foreach ($satuans as $satuan) {
            Satuan::create($satuan);
        };

        $mitras = [
            ['nama' => 'Nustra 1', 'phone' => '832472847s', 'alamat' => 'Nganjuk',],
        ];
        foreach ($mitras as $mitra) {
            Mitra::create($mitra);
        };
        $suppliers = [
            ['supplier' => 'Nustra 1', 'phone' => '832472847s', 'address' => 'Nganjuk',],
        ];
        foreach ($suppliers as $supplier) {
            Supplier::create($supplier);
        };

    }
}
