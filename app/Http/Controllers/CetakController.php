<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Models\Pesanan;
use App\Models\Pesanan_detail;
use App\Models\Produk;
use App\Models\Satuan;
use App\Models\Supplier;
use App\Models\User;
use PDF;
use Illuminate\Support\Carbon;
use Illuminate\Http\Request;

class CetakController extends Controller
{
    public function nota(Request $request)
    {
    	$data = Pesanan::where('notransaksi',$request->notransaksi)->first();
    	$data1 = Pesanan_detail::where('notransaksi',$request->notransaksi)->get();
        $data1->map(function($item){
            $harga = $item->produk->harga;
            $jumlah = $item->jumlah_produk;

            $item['harga'] = $harga * $jumlah;

            return $item;
        });

        $pdf = PDF::loadview('cetak.nota', compact('data','data1'));
        $pdf->setPaper('a4', 'landscape');
        return $pdf->stream('cetak-nota-pdf');
    }

    public function cetakproduk()
    {
        $data = Produk::orderby('id','desc')->get();
        $now = Carbon::now()->translatedFormat('l, d F Y');

        $pdf = PDF::loadview('cetak.produk', compact('data','now'));
        $pdf->setPaper('a4', 'potrait');
        return $pdf->stream('cetak-produk-pdf');
    }

    public function cetakbarangmasuk(Request $request)
    {
        $now = Carbon::now()->translatedFormat('l, d F Y');
        $start = $request->start;
        $end = $request->end;

        $data = Produk::whereBetween('created_at', [$start, $end])->get();

        $pdf = PDF::loadview('cetak.barangmasuk', compact('data', 'now', 'start', 'end'));
        return $pdf->stream('laporan-barang-pdf');
    }

    public function cetakbarangkeluar(Request $request)
    {
        $now = Carbon::now()->translatedFormat('l, d F Y');
        $start = $request->start;
        $end = $request->end;

        $data = Pesanan::join('pesanan_details','pesanans.notransaksi', '=' , 'pesanan_details.notransaksi')
                        ->join('produks','pesanan_details.produk_id','=','produks.id')
                        ->join('users','pesanans.user_id','=','users.id')
                        ->select('pesanans.status','produks.nama_barang','users.name','users.telepon','users.alamat','pesanan_details.jumlah_produk','pesanans.notransaksi','pesanans.metode_pembayaran','pesanans.jadwal_pengiriman','pesanans.estimasi')
                        ->orderBy('pesanans.id','desc')->where('pesanans.status', 5)
                        ->whereBetween('pesanans.created_at', [$start, $end])
                        ->get();

        $pdf = PDF::loadview('cetak.barangkeluar', compact('data', 'now', 'start', 'end'));
        $pdf->setPaper('a4', 'landscape');
        return $pdf->stream('laporan-barang-pdf');
    }


    public function cetakkategori()
    {
        $data = Kategori::orderby('id','desc')->get();
        $now = Carbon::now()->translatedFormat('l, d F Y');

        $pdf = PDF::loadview('cetak.kategori', compact('data','now'));
        $pdf->setPaper('a4', 'potrait');
        return $pdf->stream('cetak-produk-pdf');
    }

    public function cetaksatuan()
    {
        $data = Satuan::orderby('id','desc')->get();
        $now = Carbon::now()->translatedFormat('l, d F Y');

        $pdf = PDF::loadview('cetak.satuan', compact('data','now'));
        $pdf->setPaper('a4', 'potrait');
        return $pdf->stream('cetak-produk-pdf');
    }

    public function cetaksupplier()
    {
        $data = Supplier::orderby('id','desc')->get();
        $now = Carbon::now()->translatedFormat('l, d F Y');

        $pdf = PDF::loadview('cetak.supplier', compact('data','now'));
        $pdf->setPaper('a4', 'potrait');
        return $pdf->stream('cetak-produk-pdf');
    }

    public function cetaksuppliersatuan($id)
    {
        $data = Supplier::where('id', $id)->first();
        $produk = Produk::where('supplier_id',$id)->get();
        $now = Carbon::now()->translatedFormat('l, d F Y');

        $pdf = PDF::loadview('cetak.suppliersatuan', compact('data','now','produk'));
        $pdf->setPaper('a4', 'potrait');
        return $pdf->stream('cetak-produk-pdf');
    }


    public function cetakcustomer()
    {
        $data = User::orderby('id','desc')->where('role', 2)->get();
        $now = Carbon::now()->translatedFormat('l, d F Y');

        $pdf = PDF::loadview('cetak.customer', compact('data','now'));
        $pdf->setPaper('a4', 'potrait');
        return $pdf->stream('cetak-produk-pdf');
    }


    public function cetakterlaris()
    {

        $data = Pesanan::join('pesanan_details','pesanans.notransaksi', '=' , 'pesanan_details.notransaksi')
        ->join('produks','pesanan_details.produk_id','=','produks.id')
        ->join('kategoris','produks.kategori_id','=','kategoris.id')
        ->select('produks.nama_barang','pesanan_details.jumlah_produk','pesanans.notransaksi','kategoris.nama_kategori','pesanans.updated_at','produks.harga')
        ->orderBy('pesanan_details.jumlah_produk','desc')->where('pesanans.status', 5)->where('pesanan_details.jumlah_produk','>=', 1)
        ->get();
        $now = Carbon::now()->translatedFormat('l, d F Y');


        $pdf = PDF::loadview('cetak.terlaris', compact('data','now'));
        $pdf->setPaper('a4', 'landscape');
        return $pdf->stream('cetak-pesanan-pdf');
    }

    public function cetakkeuangan(Request $request)
    {
        $now = Carbon::now()->translatedFormat('l, d F Y');
        $start = $request->start;
        $end = $request->end;

        $data = Pesanan_detail::join('produks','produks.id','=','pesanan_details.produk_id')->wherenotnull('pesanan_details.produk_id')->whereBetween('pesanan_details.created_at',[$start,$end])->whereBetween('pesanan_details.updated_at',[$start,$end])->whereBetween('produks.created_at',[$start,$end])->get();

        $pdf = PDF::loadview('cetak.keuangan', compact('data','start','end','now'));
        $pdf->setPaper('a4', 'potrait');
        return $pdf->stream('cetak-user-pdf');
        // return view('cetak.keuangan',compact('data'));
    }
}
