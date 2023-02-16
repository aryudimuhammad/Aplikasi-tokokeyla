<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use PDF;
use Illuminate\Support\Carbon;
use Illuminate\Http\Request;

class CetakController extends Controller
{

    public function cetakproduk()
    {
        $data = Produk::orderby('id','desc')->get();
        $now = Carbon::now()->translatedFormat('l, d F Y');

        $pdf = PDF::loadview('cetak.produk', compact('data','now'));
        $pdf->setPaper('a4', 'potrait');
        return $pdf->stream('cetak-produk-pdf');
    }

    public function cetakproduktgl(Request $request)
    {
        $now = Carbon::now()->translatedFormat('l, d F Y');
        $start = $request->start;
        $end = $request->end;

        $data = Produk::whereBetween('created_at', [$start, $end])->get();

        $pdf = PDF::loadview('cetak.produktgl', compact('data', 'now', 'start', 'end'));
        return $pdf->stream('laporan-barang-pdf');
    }
}
