<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Models\Pesanan;
use App\Models\Pesanan_detail;
use App\Models\Produk;
use App\Models\User;
use Illuminate\Http\Request;
Use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

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

            if($result->user_id == null){
            $data1 = Pesanan_detail::where('produk_id', null)->first();
            $data1->delete();
            }
        } else{
            if($result->notransaksi == null && $result->status == null){
                $result = Pesanan_detail::where('produk_id', $request->produk_id)->where('user_id', $id)->whereNull('status')->whereNull('notransaksi')->first();
                $result->jumlah_produk = $result->jumlah_produk + 1;
                $result->update();

                if($result->user_id == null){
                $data1 = Pesanan_detail::where('produk_id', null)->first();
                $data1->delete();
                }
                }
            elseif($result->notransaksi == !null && $result->status == !null){
                $result = new Pesanan_detail();
                $result->produk_id = $request->produk_id;
                $result->user_id = $request->user_id;
                $result->jumlah_produk = 1;
                $result->save();

                $data1 = Pesanan_detail::where('produk_id', null)->first();
                $data1->delete();
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

    public function checkoutlist($id)
    {
        $data = Pesanan::orderby('id', 'desc')->where('status' , '<' , 5)->where('user_id', Auth()->user()->id)->get();

        return view('home.checkout', compact('data'));
    }

    public function checkout(Request $request, $id){
        $kategori = Kategori::orderBy('id', 'desc')->get();
        $date = Carbon::now()->format('mdhis');

        if($request->name){
            $user = User::where('id', $id)->first();
            $user->name = $request->name;
            $user->email = $request->email;
            $user->telepon = $request->telepon;
            $user->alamat = $request->alamat;
            $user->update();

            if($request->paymentMethod){
                $notransaksi = new Pesanan();
                $notransaksi->user_id = $id;
                $notransaksi->notransaksi = $date . $id;
                $notransaksi->metode_pembayaran = $request->paymentMethod;
                $notransaksi->status = 1;
                $notransaksi->save();
            }


        }
        Pesanan_detail::where('user_id',$id)->whereNull('status')->whereNull('notransaksi')->update(['notransaksi' => $date . $id, 'status' => 1]);


        return back()->with('success', 'Checkout Berhasil Silahkan Melakukan pembayaran di Form Checkout');
    }

}
