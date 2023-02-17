@extends('layouts.frontend.app')
@section('title') Toko Keyla @endsection
@section('content')
<section class="py-5 text-center container">
    <div class="row">
      <div class="col-12 col-sm-6">
        <h3 class="d-inline-block d-sm-none">{{$data->nama_barang}}</h3>
        <div class="col-12">
          <img src="{{ asset ( 'storage/' . $data->gambar) }}" class="product-image" alt="Product Image" style="width:400px; height:400px;"  >
        </div>
      </div>
      <div class="col-12 col-sm-6">
        <h2 class="my-3">{{$data->nama_barang}}</h2>
        <h4>Kategori : {{$data->kategori->nama_kategori}}</h4>
        <br>
        <h4>Stok : {{$data->stok}}</h4>
        <br><br>
        <p>{{$data->keterangan}}</p>

        <hr>

        <div class="bg-gray py-2 px-3 mt-4">
          <h2 class="mb-0">
          Rp. {{number_format($data->harga, 0, ',', '.') }},-
          </h2>
        </div>

        <div class="mt-4">
            @if(Route::has('login'))
            @auth
            <form method="POST" action="{{route('cart' , ['id' => Auth()->user()->id])}}">
            @csrf
                <input type="text" hidden name="produk_id" value="{{$data->id}}">
                <input type="text" hidden name="user_id" value="{{ Auth()->user()->id}}">
                <button type="submit" class="btn btn-primary btn-lg btn-flat" data-toggle="modal" data-target="#exampleModal">Masukkan Cart</button>
                <a type="button" href="{{ route ('welcome')}}" class="btn btn-danger btn-lg btn-flat">Kembali ke Halaman Awal</a>
            </form>
            @else
            <div class="btn btn-primary btn-lg btn-flat">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">Masukkan Cart</button>
            </div>
            @endauth
        @endif
</section>




@include('home.logindahulu')
<br><br><br><br><br>
@endsection
