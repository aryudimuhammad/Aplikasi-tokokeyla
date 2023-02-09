<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Models\Pesanan_detail;
use App\Models\Produk;
use Illuminate\Http\Request;
Use Illuminate\Support\Carbon;

class PesananController extends Controller
{
    public function cart(Request $request, $id)
    {
        $kategori = Kategori::orderBy('id', 'desc')->get();
        $data = Produk::where('id', $request->produk_id)->first();
        $date = Carbon::now()->format('mdhis');


        $result = Pesanan_detail::where('produk_id', $request->produk_id)->where('user_id', $id)->whereNull('status')->first();
        if (empty($result)) {
            $result = new Pesanan_detail();
            $result->produk_id = $request->produk_id;
            $result->user_id = $request->user_id;
            $result->jumlah_produk = 1;
            $result->save();
        } else{
            if($result->notransaksi == null && $result->status == null){
                $result = Pesanan_detail::where('produk_id', $request->produk_id)->where('user_id', $id)->whereNull('status')->whereNull('notransaksi')->first();
                $result->jumlah_produk = $result->jumlah_produk + 1;
                $result->update();
                }
            elseif($result->notransaksi == !null && $result->status == !null){
                $result = new Pesanan_detail();
                $result->produk_id = $request->produk_id;
                $result->user_id = $request->user_id;
                $result->jumlah_produk = 1;
                $result->save();
            }
        }

        $data1 = Pesanan_detail::where('user_id', $id)->whereNull('notransaksi')->get();
        $data1->map(function($item){
            $harga = $item->produk->harga;
            $jumlah = $item->jumlah_produk;

            $item['harga'] = $harga * $jumlah;

            return $item;
        });

        $data2 = Pesanan_detail::where('user_id', $id)->whereNull('notransaksi')->first();

        return view('home.cart', compact('data','kategori','result','data1','data2','date'));
    }

    public function cartjumlah(Request $request , $id)
    {
        $data = Pesanan_detail::where('user_id' , $id)->where('produk_id', $request->id)->first();
        if($request->jumlah < $data->produk->stok){
        $data->jumlah_produk = $request->jumlah;
        $data->update();

        return back()->with('success', 'Jumlah Produk Berhasil Diubah');
        }else{
        return back()->with('warning', 'Jumlah Produk Melebihi Stok');
        }
    }

    public function cartdelete(Request $request,$id)
    {
        $data = Pesanan_detail::where('id', $request->id)->first();
        $data->delete();

        return back()->with('success', 'Data Berhasil Dihapus');
    }
}
