@extends('layouts.backend.app')
@section('tittle') Produk Detail @endsection
@section('content')
<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Pesanan</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Pesanan</a></li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
</section>
<section class="content">
            <div class="card">
              <div class="card-header">
                 <a style="float: right;" href="{{route('adminpesanan')}}" class="btn btn-danger btn-sm">Kembali</a>
              </div>
            </div>
</section>
<section class="content">
      <div class="container-fluid">
            <div class="card">
            <div class="card-header">
                </div>
              <!-- /.card-header -->
              <div class="card-body">
        <table class="table table-bordered nowrap">
            <thead>
                <tr>
                    <th scope="col" class="text-center">No</th>
                    <th scope="col" class="text-center">Notransaksi</th>
                    <th scope="col" class="text-center">Customer</th>
                    <th scope="col" class="text-center">Nomor Telepon</th>
                    <th scope="col" class="text-center">Alamat</th>
                    <th scope="col" class="text-center">Produk</th>
                    <th scope="col" class="text-center">Jumlah</th>
                    <th scope="col" class="text-center">Metode Pembayaran</th>
                    <th scope="col" class="text-center">Tanggal Pengiriman</th>
                    <th scope="col" class="text-center">Estimasi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($data as $d)
                <tr>
                    <td scope="col" class="text-center">{{$loop->iteration}}</td>
                    <td scope="col" class="text-center">{{$d->notransaksi}}</td>
                    <td scope="col" class="text-center">{{$d->name}}</td>
                    <td scope="col" class="text-center">{{$d->telepon}}</td>
                    <td scope="col" class="text-center">{{$d->alamat}}</td>
                    <td scope="col" class="text-center">{{$d->nama_barang}}</td>
                    <td scope="col" class="text-center">{{$d->jumlah_produk}} Qty</td>
                    <td scope="col" class="text-center">{{$d->metode_pembayaran}}</td>
                    @if ($d->jadwal_pengiriman == null)
                        <td>-</td>
                    @else
                    <td scope="col" class="text-center">{{$d->jadwal_pengiriman}}</td>
                    @endif

                    @if ($d->estimasi == null)
                    <td>-</td>
                    @else
                    <td scope="col" class="text-center">{{$d->estimasi}}</td>
                    @endif
                </tr>
                @endforeach
            </tbody>
        </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
</section>
@endsection
