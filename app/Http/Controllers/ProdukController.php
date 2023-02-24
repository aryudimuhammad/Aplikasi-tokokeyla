<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Models\Produk;
use App\Models\Satuan;
use App\Models\Supplier;
use App\Models\User;
use Illuminate\Http\Request;

class ProdukController extends Controller
{
    public function welcome()
    {
        // $carousel = Produk::orderBy('id', 'desc')->paginate(3);
        $kategori = Kategori::orderBy('id', 'desc')->get();
        $produk = Produk::orderBy('id', 'desc')->paginate(9)->withQueryString();

        return view('welcome', compact('produk','kategori'));
    }

    public function detail($id)
    {
        $data = Produk::where('id', $id)->first();

        return view('home.detail', compact('data'));
    }

    public function profil()
    {
        $data = User::orderBy('id', 'desc')->first();

        return view('home.profil', compact('data'));
    }


    //--------------------- Admin -------------------vvv

    public function index()
    {
        $data = Produk::orderBy('id', 'desc')->get();
        $kategori = Kategori::orderBy('id', 'desc')->get();
        $satuan = Satuan::orderBy('id', 'desc')->get();
        $supplier = Supplier::orderBy('id', 'desc')->get();

        return view('admin.produk.index', compact('data', 'kategori', 'satuan', 'supplier'));
    }

    public function create(Request $request)
    {
        $data =  new Produk;
        $data->nama_barang = $request->nama_barang;
        $data->kategori_id = $request->kategori_id;
        $data->satuan_id = $request->satuan_id;
        $data->supplier_id = $request->supplier_id;
        $data->stok = $request->stok;
        $data->harga = $request->harga;
        $data->gambar = $request->file('gambar')->store('post-images');
        $data->save();

        return back()->with('success', 'Data Berhasil Ditambah.');
    }

    public function edit(Request $request)
    {
        $data = Produk::find($request->id);
        $data->nama_barang = $request->nama_barang;
        $data->kategori_id = $request->kategori_id;
        $data->satuan_id = $request->satuan_id;
        $data->stok = $request->stok;
        $data->harga = $request->harga;
        if($request->gambar){
            $data->gambar = $request->file('gambar')->store('post-image');
        }
        $data->update();

        return back()->with('success', 'Data Berhasil Diubah.');
    }

    public function delete($id)
    {
        $data = Produk::find($id);
        $data->delete();

        return back()->with('success', 'Data Berhasil Dihapus.');
    }
}
