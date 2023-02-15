<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    public function index()
    {
        $data = Kategori::orderBy('id', 'desc')->get();

        return view('admin.kategori.index', compact('data'));
    }

    public function create(Request $request)
    {
        $data =  new Kategori;
        $data->nama_kategori = $request->nama_kategori;
        $data->save();

        return back()->with('success', 'Data Berhasil Ditambahkan.');
    }

    public function edit(Request $request)
    {
        $data = Kategori::find($request->id);
        $data->nama_kategori = $request->nama_kategori;
        $data->update();

        return back()->with('success', 'Data Berhasil Diubah.');
    }

    public function delete($id)
    {
        $data = Kategori::find($id);
        $data->delete();

        return back()->with('success', 'Data Berhasil Dihapus.');
    }
}
