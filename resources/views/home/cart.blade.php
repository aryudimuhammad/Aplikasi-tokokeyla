@extends('layouts.frontend.app')
@section('title') Cart Toko Keyla @endsection
@section('content')
<div class="container py-5">
<h3> <b> Cart Belanja </b> <a href="{{route('welcome')}}" style="float: right;" class="btn btn-outline-danger"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chevron-left" viewBox="0 0 16 16">
  <path fill-rule="evenodd" d="M11.354 1.646a.5.5 0 0 1 0 .708L5.707 8l5.647 5.646a.5.5 0 0 1-.708.708l-6-6a.5.5 0 0 1 0-.708l6-6a.5.5 0 0 1 .708 0z"/>
</svg> <i class="bi bi-chevron-left"> </i>Kembali</a> </h3>
<hr class="my-4">

@if (empty($result))
<b>Cart Belanja Kosong Kosong</b>
@elseif (empty($data2))
<table class="table">
  <thead>
    <tr>
      <th scope="col">No.</th>
      <th scope="col">Nama Barang</th>
      <th scope="col">Kategori</th>
      <th scope="col">Jumlah Produk</th>
      <th scope="col">Harga Total</th>
      <th scope="col">Aksi</th>
    </tr>
  </thead>
<tbody>
    <tr>
      <td style="text-align:center" colspan="6"> <h3>Cart Belanja Kosong</h3></td>
    </tr>
</tbody>
</table>
</div>
<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
  @else
  <table class="table">
      <thead>
          <tr>
      <th scope="col">No.</th>
      <th scope="col">Nama Barang</th>
      <th scope="col">Kategori</th>
      <th scope="col">Jumlah Produk</th>
      <th scope="col">Harga Produk</th>
      <th scope="col">Sub Total</th>
      <th scope="col">Aksi</th>
    </tr>
</thead>
<tbody>
    @foreach ($data1 as $d)
<tr>
    <td class="text-center">{{$loop->iteration}}</td>
    <td>{{$d->produk->nama_barang}}</td>
    <td>{{$d->produk->kategori->nama_kategori}}</td>
    <td>
    <form action="{{route('cartjumlah',['id' => Auth()->user()->id])}}" method="POST">
        @csrf
        {{method_field('PUT')}}
    <div class="counter">
        <input name="id" id="id" hidden value="{{$d->produk_id}}">
        <input name="jumlah" id="jumlah" value="{{$d->jumlah_produk}}" type="number" style="width: 45px;">
        <button class="btnc" type="sumibt"><i class="fa-solid fa-arrows-rotate"></i></button>
    </div>
    </form>
    </td>
    <td>Rp.{{number_format($d->produk->harga) }},-</td>
    <td>Rp.{{number_format($d->produk->harga * $d->jumlah_produk, 0, ',', '.') }},-</td>
    <td><form action="{{route('cartdelete',['id' , Auth()->user()->id])}}" method="post">
        {{method_field('DELETE')}}
        @csrf
        <input type="text" name="id" id="id" hidden value="{{$d->id}}">
        <button class="btn btn-sm btn-danger" type="submit"><i class="fas fa-trash"></i></button>
</form>
</td>
</tr>
@endforeach
</tbody>
<tfoot>
    <tr>
        <td></td>
        <th>TOTAL HARGA :</th>
        <td></td>
        <td></td>
        <td></td>
        <td>Rp.{{$data1->sum('harga')}},-</td>
        <td></td>
    </tr>
</tfoot>

</table>


<form method="get" action="#" novalidate>
@csrf
<div class="row align-items-start">
@auth
<div class="py-5 col">
<h4 class="mb-3">Data Pembeli</h4>
    <div class="row g-3">
            <div class="col-sm-12">
              <label for="name" class="form-label">Nama Lengkap</label>
              <input type="text" class="form-control" name="name" placeholder="Nama Lengkap" value=" {{ Auth::user()->name }}" required>
            </div>

            <div class="col-12">
              <label for="email" class="form-label">Email</label>
              <input type="email" class="form-control" name="email" placeholder="you@example.com" value=" {{ Auth::user()->email }}" required>
            </div>

            <div class="col-12">
              <label for="telepon" class="form-label">telepon</label>
              <input type="text" class="form-control" name="telepon" placeholder="Nomor HP" value=" {{ Auth::user()->telepon }}" required>
            </div>

            <div class="col-12">
              <label for="alamat" class="form-label">alamat</label>
              <input type="text" class="form-control" name="alamat" placeholder="Alamat Tempat tinggal" value=" {{ Auth::user()->alamat }}" required>
            </div>
@endauth
          </div>
    </div>


<div class="py-5 col">
<h4 class="mb-3">Metode Pembayaran</h4>
<div class="my-3">
  <div class="custom-control custom-checkbox">
    <input id="credit" name="paymentMethod" type="checkbox" value="Credit Card" class="custom-control-input" checked required>
    <label class="custom-control-label" for="credit">Credit card</label>
  </div>
  <div class="custom-control custom-checkbox">
    <input id="dana" name="paymentMethod" type="checkbox" value="Dana" class="custom-control-input" required>
    <label class="custom-control-label" for="Dana">Dana</label>
  </div>
  <div class="custom-control custom-checkbox">
    <input id="ovo" name="paymentMethod" type="checkbox" value="Ovo" class="custom-control-input" required>
    <label class="custom-control-label" for="Ovo">Ovo</label>
  </div>
</div>
</div>

<hr class="my-4">
<button class="w-100 btn btn-primary btn-lg" type="submit">Continue to checkout</button>
</div>
</form>
</div>
@endif
@endsection

