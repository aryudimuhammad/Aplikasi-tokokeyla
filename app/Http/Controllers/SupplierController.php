<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use App\Models\Supplier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class SupplierController extends Controller
{
    public function supplier()
    {
        $data = Supplier::orderBy('id', 'desc')->get();

        return view('admin.supplier.index',compact('data'));
    }

    public function suppliercreate(Request $request){
        $data = new Supplier();
        $data->nama_supplier = $request->nama_supplier;
        $data->alamat = $request->alamat;
        $data->telepon = $request->telepon;
        $data->save();

        return back()->with('success', 'Data Berhasil Disimpan.');
    }

    public function supplieredit(Request $request)
    {
        $data = Supplier::find($request->id);
        $data->nama_supplier = $request->nama_supplier;
        $data->alamat = $request->alamat;
        $data->telepon = $request->telepon;
        $data->update();

        return back()->with('success','Data Berhasil Dibuah.');
    }

    public function supplierdelete($id)
    {
        $data = Supplier::where('id', $id)->first();
        $data->delete();

        return back()->with('success','Data Berhasil Dihapus.');
    }

    public function supplierdetail($id)
    {
        $data = Supplier::where('id',$id)->first();
        $produk = Produk::where('supplier_id',$id)->get();

        return view('admin.supplier.detail',compact('data','produk'));
    }

    public function supplierrefund(Request $request)
    {
        $data = Produk::find($request->id);
        if($request->refund > $data->stok){
            return back()->with('warning','Data Tidak Boleh Lebih dari Jumlah Stok Barang.');
        } else {
            $data->stok = $data->stok - $request->refund;
            $data->update();

            return back()->with('success','Data Berhasil Di Refund.');
        }
    }
}
