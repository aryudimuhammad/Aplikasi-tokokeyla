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
                 <a style="float: right;" href="{{route('produkindex')}}" class="btn btn-danger btn-sm">Kembali</a>
              </div>
            </div>
</section>
<section class="content">
    <div class="container-fluid">
    <div class="card">
        <div class="row">
        <div class="col-12 col-sm-6">
            <h3 class="d-inline-block d-sm-none">{{$data->nama_barang}}</h3>
            <div class="col-12">
            <img src="{{asset('storage/' . $data->gambar)}}" class="product-image" alt="Product Image">
            </div>
        </div>
        <div class="col-12 col-sm-6">
            <h3 class="my-3">{{$data->nama_barang}}</h3>
            <h5>Supllier : {{$data->supplier->nama_supplier}}</h5>
            <h5>Kategori : {{$data->kategori->nama_kategori}}</h5>
            <h5>Satuan : {{$data->pcs}} {{$data->satuan->nama_satuan}}</h5>
            <h5>Stok : {{$data->stok}} Qty</h5>
            <hr>

            <!-- <p>{{$data->keterangan}}</p> -->

            <div class="py-2 px-3 mt-4">
            <h2 class="mb-0">
            Rp. {{number_format($data->harga, 0, ',', '.') }},-
            </h2>
            </div>

            <div class="mt-4">
                    <input type="text" hidden name="produk_id" value="{{$data->id}}">
                    <input type="text" hidden name="user_id" value="{{ Auth()->user()->id}}">
            </div>

        </div>
        </div>
  <!-- /.card-body -->
    </div>
    </div>
</section>
@endsection
