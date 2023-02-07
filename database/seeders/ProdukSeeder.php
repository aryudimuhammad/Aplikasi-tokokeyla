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
            'nama_kategori' => 'kategori1',
        ]);
        DB::table('kategoris')->insert([
            'nama_kategori' => 'kategori2',
        ]);
        DB::table('kategoris')->insert([
            'nama_kategori' => 'kategori3',
        ]);
        DB::table('kategoris')->insert([
            'nama_kategori' => 'kategori4',
        ]);
        DB::table('kategoris')->insert([
            'nama_kategori' => 'kategori5',
        ]);



        DB::table('satuans')->insert([
            'nama_satuan' => 'satuan1',
        ]);
        DB::table('satuans')->insert([
            'nama_satuan' => 'satuan2',
        ]);
        DB::table('satuans')->insert([
            'nama_satuan' => 'satuan3',
        ]);
        DB::table('satuans')->insert([
            'nama_satuan' => 'satuan4',
        ]);
        DB::table('satuans')->insert([
            'nama_satuan' => 'satuan5',
        ]);



        DB::table('produks')->insert([
            'nama_barang' => 'produk1',
            'kategori_id' => '1',
            'satuan_id' => '1',
            'stok' => '23',
            'harga' => '10000',
            'gambar' => 'img/gas.png',
        ]);
        DB::table('produks')->insert([
            'nama_barang' => 'produk2',
            'kategori_id' => '2',
            'satuan_id' => '2',
            'stok' => '23',
            'harga' => '10000',
            'gambar' => 'img/beras.jpeg',

        ]);
        DB::table('produks')->insert([
            'nama_barang' => 'produk3',
            'kategori_id' => '3',
            'satuan_id' => '3',
            'stok' => '23',
            'harga' => '10000',
            'gambar' => 'img/beras.jpeg',
        ]);
        DB::table('produks')->insert([
            'nama_barang' => 'produk4',
            'kategori_id' => '4',
            'satuan_id' => '4',
            'stok' => '23',
            'harga' => '10000',
            'gambar' => 'img/beras.jpeg',
        ]);
        DB::table('produks')->insert([
            'nama_barang' => 'produk5',
            'kategori_id' => '5',
            'satuan_id' => '5',
            'stok' => '23',
            'harga' => '10000',
            'gambar' => 'img/beras.jpeg',
        ]);
        DB::table('produks')->insert([
            'nama_barang' => 'produk6',
            'kategori_id' => '5',
            'satuan_id' => '5',
            'stok' => '23',
            'harga' => '10000',
            'gambar' => 'img/a.jpeg',
        ]);
        DB::table('produks')->insert([
            'nama_barang' => 'produk7',
            'kategori_id' => '5',
            'satuan_id' => '5',
            'stok' => '23',
            'harga' => '10000',
            'gambar' => 'img/beras.jpeg',
        ]);
        DB::table('produks')->insert([
            'nama_barang' => 'produk8',
            'kategori_id' => '5',
            'satuan_id' => '5',
            'stok' => '23',
            'harga' => '10000',
            'gambar' => 'img/beras.jpeg',
        ]);
        DB::table('produks')->insert([
            'nama_barang' => 'produk9',
            'kategori_id' => '5',
            'satuan_id' => '5',
            'stok' => '23',
            'harga' => '10000',
            'gambar' => 'img/beras.jpeg',
        ]);
        DB::table('produks')->insert([
            'nama_barang' => 'produk18',
            'kategori_id' => '5',
            'satuan_id' => '5',
            'stok' => '23',
            'harga' => '10000',
            'gambar' => 'img/beras.jpeg',
        ]);
        DB::table('produks')->insert([
            'nama_barang' => 'produk99',
            'kategori_id' => '5',
            'satuan_id' => '5',
            'stok' => '23',
            'harga' => '10000',
            'gambar' => 'img/beras.jpeg',
        ]);
    }
}
