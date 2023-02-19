<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProdukSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('kategoris')->insert([
            'nama_kategori' => 'Tepung',
        ]);
        DB::table('kategoris')->insert([
            'nama_kategori' => 'Kecap',
        ]);
        DB::table('kategoris')->insert([
            'nama_kategori' => 'Beras',
        ]);
        DB::table('kategoris')->insert([
            'nama_kategori' => 'Gula',
        ]);
        DB::table('kategoris')->insert([
            'nama_kategori' => 'Minyak Goreng',
        ]);
        DB::table('kategoris')->insert([
            'nama_kategori' => 'Mie',
        ]);



        DB::table('satuans')->insert([
            'nama_satuan' => 'Kilogram',
        ]);
        DB::table('satuans')->insert([
            'nama_satuan' => 'Gram',
        ]);
        DB::table('satuans')->insert([
            'nama_satuan' => 'Liter',
        ]);
        DB::table('satuans')->insert([
            'nama_satuan' => 'Sachet',
        ]);
        DB::table('satuans')->insert([
            'nama_satuan' => 'Kotak/Dus',
        ]);
        DB::table('satuans')->insert([
            'nama_satuan' => 'Pcs',
        ]);
        DB::table('satuans')->insert([
            'nama_satuan' => 'ML',
        ]);



        DB::table('produks')->insert([
            'nama_barang' => 'Beras Ngawiti Mas',
            'kategori_id' => '3',
            'satuan_id' => '1',
            'pcs' => '5',
            'stok' => '6',
            'harga' => '62000',
            'gambar' => 'post-images/BerasNgawitiMas.png',
        ]);
        DB::table('produks')->insert([
            'nama_barang' => 'Beras Rojolele',
            'kategori_id' => '3',
            'satuan_id' => '1',
            'pcs' => '2.5',
            'stok' => '5',
            'harga' => '27000',
            'gambar' => 'post-images/berasrojolele.png',

        ]);
        DB::table('produks')->insert([
            'nama_barang' => 'Beras Sania',
            'kategori_id' => '3',
            'satuan_id' => '1',
            'pcs' => '1',
            'stok' => '13',
            'harga' => '15000',
            'gambar' => 'post-images/berassania.png',
        ]);
        DB::table('produks')->insert([
            'nama_barang' => 'Beras Setra Ramos Cap Topi Koki',
            'kategori_id' => '3',
            'satuan_id' => '1',
            'pcs' => '1',
            'stok' => '23',
            'harga' => '10000',
            'gambar' => 'post-images/BerasSetraKoki.png',
        ]);
        DB::table('produks')->insert([
            'nama_barang' => 'Si Pulen Beras Pandan Wangi',
            'kategori_id' => '3',
            'satuan_id' => '1',
            'pcs' => '1',
            'stok' => '16',
            'harga' => '19000',
            'gambar' => 'post-images/beraspulen.png',
        ]);
        DB::table('produks')->insert([
            'nama_barang' => 'Gulaku',
            'kategori_id' => '4',
            'satuan_id' => '1',
            'pcs' => '1',
            'stok' => '23',
            'harga' => '13500',
            'gambar' => 'post-images/gulaku.png',
        ]);
        DB::table('produks')->insert([
            'nama_barang' => 'Kecap ABC',
            'kategori_id' => '2',
            'satuan_id' => '7',
            'pcs' => '700',
            'stok' => '36',
            'harga' => '19000',
            'gambar' => 'post-images/kecapabc.png',
        ]);
        DB::table('produks')->insert([
            'nama_barang' => 'IndoMie Goreng',
            'kategori_id' => '6',
            'satuan_id' => '5',
            'pcs' => '1',
            'stok' => '7',
            'harga' => '102000',
            'gambar' => 'post-images/miegoreng.png',
        ]);
        DB::table('produks')->insert([
            'nama_barang' => 'Minyak Goreng Bimoli',
            'kategori_id' => '5',
            'satuan_id' => '3',
            'pcs' => '1',
            'stok' => '33',
            'harga' => '26000',
            'gambar' => 'post-images/minyakbimoli.png',
        ]);
        DB::table('produks')->insert([
            'nama_barang' => 'Tepung Segitiga Biru',
            'kategori_id' => '1',
            'satuan_id' => '1',
            'pcs' => '1',
            'stok' => '25',
            'harga' => '13500',
            'gambar' => 'post-images/tepungsegitiga.png',
        ]);
    }
}
