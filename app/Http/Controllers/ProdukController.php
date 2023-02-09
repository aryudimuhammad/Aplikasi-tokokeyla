<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Models\Produk;
use App\Models\Satuan;
use Illuminate\Http\Request;

class ProdukController extends Controller
{
    public function welcome()
    {
        $carousel = Produk::orderBy('id', 'desc')->paginate(3);
        $kategori = Kategori::orderBy('id', 'desc')->get();
        $produk = Produk::orderBy('id', 'desc')->paginate(9)->withQueryString();

        return view('welcome', compact('produk','carousel','kategori'));
    }

    public function detail()
    {
        $data = Produk::orderBy('id', 'desc')->first();

        return view('home.detail', compact('data'));
    }

    public function index()
    {
        $data = Produk::orderBy('id', 'desc')->get();
        $kategori = Kategori::orderBy('id', 'desc')->get();
        $satuan = Satuan::orderBy('id', 'desc')->get();

        return view('admin.produk.index', compact('data', 'kategori', 'satuan'));
    }

    public function create(Request $request)
    {
        $data =  new Produk;
        $data->nama_barang = $request->nama_barang;
        $data->kategori_id = $request->kategori_id;
        $data->satuan_id = $request->satuan_id;
        $data->stok = $request->stok;
        $data->harga = $request->harga;
        $data->save();

        return back();
    }

    public function edit(Request $request)
    {
        $data = Produk::find($request->id);
        $data->nama_barang = $request->nama_barang;
        $data->kategori_id = $request->kategori_id;
        $data->satuan_id = $request->satuan_id;
        $data->stok = $request->stok;
        $data->harga = $request->harga;
        $data->update();

        return back();
    }

    public function delete($id)
    {
        $data = Produk::find($id);
        $data->delete();

        return back();
    }
}
