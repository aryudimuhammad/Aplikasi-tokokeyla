<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Models\Produk;
use App\Models\Satuan;
use Illuminate\Http\Request;

class ProdukController extends Controller
{
    public function index()
    {
        $data = Produk::orderBy('id', 'desc')->get();
        $kategori = Kategori::orderBy('id', 'desc')->get();
        $satuan = Satuan::orderBy('id', 'desc')->get();

        return view('admin.produk.index', compact('data','kategori','satuan'));
    }


}
