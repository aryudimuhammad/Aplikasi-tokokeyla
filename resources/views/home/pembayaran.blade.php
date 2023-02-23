@extends('layouts.frontend.app')
@section('title')
Pembayaran
@endsection
@section('head')
<style>
        .logo {
            margin-top: 11px;
            float: left;
            margin-right: -5px;
            width: 22%;
            padding: 0px;
            text-align: right;
        }

        .judul {
            text-align: center;
        }

        table {
            border-collapse: collapse;
            width: 66%;
        }

        td,
        th {
            padding-left: 5px;
        }

        .headtext {
            float: right;
            margin-left: 0px;
            width: 75%;
            padding-left: 0px;
            padding-right: 10%;
        }

        .sizeimg {
            width: 90px;
        }

        .headtext {
            float: right;
            margin-left: 0px;
            width: 75%;
            padding-left: 0px;
            padding-right: 12%;
        }

        .header {
            margin-bottom: 0px;
            text-align: center;
            height: 19px;
            padding: 0px;
        }

        hr {
            margin-top: 10%;
            height: 3px;
            background-color: black;
        }

        br {
            margin-bottom: 5px !important;
        }

        h5 {
            line-height: 0.3;
        }
</style>
@endsection
@section('content')
<div class="wrap py-5">
    <div class="container-lg">
    @if ($data1->status == 2)
            <div class="row d-lg-flex justify-content-center">
                <div class="col-lg-12">

                    <h1>Pembayaran</h1>

                    <h2 class="my-2"><i class="fa fa-chevron-right"></i> Total yang harus Anda bayarkan</h2>

                    <div id="tagihan-list">

                    <div class="card card-tagihan shadow-sm my-3">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-6 col-md-6">
                                        <h4 class="text-blue-dark">Notransaksi</h4> <br>
                                    </div>
                                    <div class="col-6 col-md-6">
                                        <h4 style="margin-left: 250px;" class="text-nowrap text-secondary">#{{$data1->notransaksi}}</h4>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card card-tagihan shadow-sm my-3">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-6 col-md-6">
                                        <h4 class="text-blue-dark">Harga Ongkir</h4> <br>
                                    </div>
                                    <div class="col-6 col-md-6">
                                        <h4 style="margin-left: 250px;" class="text-nowrap text-secondary">Rp. {{number_format($data1->ongkir, 0, ',', '.') }},-</h4>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card card-tagihan shadow-sm my-3">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-6 col-md-6">
                                        <h4 class="text-blue-dark">Total Harga Produk</h4> <br>
                                    </div>
                                    <div class="col-6 col-md-6">
                                        <h4 style="margin-left: 250px;" class="text-nowrap text-secondary">Rp. {{$data2->sum('harga')}},-</h4>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card card-tagihan shadow-sm my-3">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-6 col-md-6">
                                        <h4 class="text-blue-dark">Total Pembayaran</h4> <br>
                                    </div>
                                    <div class="col-6 col-md-6">
                                        <h4 style="margin-left: 250px;" class="text-nowrap text-secondary">Rp. {{number_format($data1->ongkir + $data2->sum('harga'), 0, ',', '.') }},-</h4>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card card-tagihan shadow-sm my-3">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-6 col-md-6">
                                        <h4 class="text-blue-dark">Metode Pembayaran</h4> <br>
                                    </div>
                                    <div class="col-6 col-md-6">
                                        <h4 style="margin-left: 250px;" class="text-nowrap text-secondary">{{$data1->metode_pembayaran}}</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <form method="POST" action="" enctype="multipart/form-data">
                    @csrf
                        <div class="card card-tagihan shadow-sm my-3">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-6 col-md-6">
                                        <h4 class="text-blue-dark">Bukti Pembayaran</h4> <br>
                                    </div>
                                    <div class="col-6 col-md-6">
                                        <h4 style="margin-left: 250px;" class="text-nowrap text-secondary"> <input type="file" id="bukti" class="custom-file  @error ('bukti') is-invalid @enderror" name="bukti" value="{{old('bukti')}}" required></h4>
                                        <input type="text" value="{{$data1->id}}" hidden name="id">
                                        @foreach ($data2 as $d)
                                        <input type="text" value="{{$d->produk_id}}" hidden name="produk_id">
                                        <input type="text" value="{{$d->jumlah_produk}}" hidden name="jumlah">
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    <button class="btn btn-lg btn-primary" type="submit" style="float:right;">Lakukan Pembayaran</button>
                    </form>
                    </div>


                   <h2>Keterangan</h2>
                    <ul class="my-1">
                        <li class="list-item">
                            <h4>Foto/Screenshot Bukti Pembayaran dan upload file bukti pembayaran.</h4>
                        </li>
                        <li class="list-item">
                            <h4>Jika Selesai melakukan pembayaran, admin akan segera memproses pengiriman barang.</h4>
                        </li>
                        <li class="list-item">
                            <h4>Apabila Barang rusak karena proses pengiriman diluar tanggung jawab kami.</h4>
                        </li>
                    </ul>
                </div>
            </div>
        @elseif ($data1->status == 1)
        <div class="row d-lg-flex justify-content-center">
                <div class="col-lg-12">
                    <h5>Silahkan Tunggu Verifikasi Dari Admin untuk melakukan <a style="text-decoration: none;" href="{{route('pembayaranlist',['id' => Auth()->user()->id])}}">Pembayaran</a>.</h5>
                </div>
        </div>
        @elseif ($data1->status == 3)
<div class="header">
    <div class="logo">
        <img class="sizeimg" src="{{url('img/logo1.png')}}">
    </div>
    <div class="headtext">
            <h1 style="margin:0px;">Toko Keyla</h1>
            <h2 style="margin:0px;">Jl. Trikora, Kel.Guntung Manggis, Kec. Landasan Ulin, Kota Banjarbaru, Kalimantan Selatan</h2>
            <h2 style="margin:0px;">Telp. 081953000765</h2>
        </div>
</div>
<hr>

<div class="container" style="margin-top:10px;">
      <table class='nowrap'>
        <tbody>
          <tr>
            <td><h4>Nama</h4>  </td>
            <td> <h4>:</h4></td>
            <td> <h4>{{Auth()->user()->name}}</h4></td>
          </tr>
          <tr>
            <td><h4>Alamat</h4> </td>
            <td> <h4>:</h4> </td>
            <td> <h4>{{Auth()->user()->alamat}}</h4></td>
          </tr>
          <tr>
            <td><h4>Nomor Telepon</h4> </td>
            <td> <h4>:</h4> </td>
            <td><h4>{{Auth()->user()->telepon}}</h4></td>
          </tr>
          <tr>
            <td><h4>Nama Barang</h4> </td>
            <td> <h4>:</h4> </td>
            <td> @foreach ($data2 as $d)
                <h4>{{$d->produk->nama_barang}}, {{$d->produk->pcs}} {{$d->produk->satuan->nama_satuan}}.</h4>
            @endforeach</td>
          </tr>
          <tr>
            <td><h4>Jumlah Item</h4> </td>
            <td> <h4>:</h4> </td>
            <td>
            <h4>{{$data2->sum('jumlah_produk')}} Qty</h4>
            </td>
          </tr>
          <tr>
            <td><h4>Total Harga</h4> </td>
            <td> <h4>:</h4> </td>
            <td>
                <h4>Rp.{{number_format($data2->sum('harga'), 0, ',', '.') }} </h4>
            </td>
          </tr>
          <tr>
            <td><h4>Metode Pembayaran</h4> </td>
            <td> <h4>:</h4> </td>
            <td> <h4>{{$data1->metode_pembayaran}}</h4></td>
          </tr>
          <tr>
            <td><h4>Estimasi</h4> </td>
            <td> <h4>:</h4> </td>
            @if ($data1->estimasi == null)
            <td> <h4>Menunggu Barang Diserahkan Ke Kurir</h4></td>
            @else
            <td> <h4>{{$data1->estimasi}}</h4></td>
            @endif
          </tr>
        </tbody>
      </table>
      <br>
      <div id="notices">
        <div class="notice"><b>Note : Apabila Barang Rusak Karena Proses Pengiriman diluar tanggung jawab kami.</b></div>
      </div>
</div>
<form method="get" action="{{route('nota')}}">
    <input type="text" value="{{$data1->notransaksi}}" hidden name="notransaksi">
<button type="submit" class="btn btn-lg btn-primary" style="float:right;">Cetak</button>
</form>

        @elseif ($data->status == 4)
        <div class="row d-lg-flex justify-content-center">
                <div class="col-lg-12">
                    <h5>Barang Anda Sedang Dikirim Oleh Kurir.</h5>
                    <small>Estimasi Pengiriman {{$data->estimasi}}.</small> <br>
                    <small>Note : Apabila barang rusak karena pengiriman diluar tanggung jawab kami.</small> <br> <br>
                    <form action="" method="POST">
                    {{method_field('PUT')}}
                    @csrf
                    <input type="text" id="notransaksi" name="notransaksi" value="{{$data->notransaksi}}">
                    <small>Click Disini Jika Pesanan Sudah Diterima</small> <br><button type="submit" class="btn btn-primary">Diterima</button>
                    </form>
                </div>
        </div>
        @else
        <div class="row d-lg-flex justify-content-center">
                <div class="col-lg-12">
                    <h5>Silahkan Tunggu Verifikasi Dari Admin untuk melakukan <a style="text-decoration: none;" href="{{route('pembayaranlist',['id' => Auth()->user()->id])}}">Pembayaran</a>.</h5>
                </div>
        </div>
        @endif
    </div>
</div>
<br><br>
@endsection
