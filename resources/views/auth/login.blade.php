@extends('layouts.frontend.app')
@section('title')
Form Login
@endsection
@section('content')
<br><br><br><br>
<div class="container">
    <div class="row justify-content-center">
<div class="login-box">
    <div class="login-logo">
      <a><b>TOKO KAYLA</b><br>E-Commerce and Inventory</a>
    </div>
    <!-- /.login-logo -->
    <div class="card">
      <div class="card-body login-card-body">
        <p class="login-box-msg">Masukkan Email & Password</p>

        <form method="POST" action="{{ route('login') }}">
            @csrf
          <div class="input-group mb-3">
            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email"
            value="{{ old('email') }}" required autocomplete="email" placeholder="Email.." autofocus>
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-envelope"></span>
              </div>
            </div>
          </div>
          <div class="input-group mb-3">
            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Password..">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
          </div>
          <div class="row">
            <!-- /.col -->
            <div class="col-4">
              <button type="submit" class="btn btn-primary btn-block">
                {{ __('Login') }}
              </button>
            </div>
            <div class="col-8">
                <a href="{{route ('register')}}"><small>Daftar Sekarang!!</small></a>
            </div>
            <!-- /.col -->
          </div>
        </form>

        <!-- /.social-auth-links -->

        <!-- <p class="mb-0">
          <a href="{{ route ('register')}}" class="text-center"><b>Daftar</b></a>
        </p> -->
      </div>
      <!-- /.login-card-body -->
    </div>
</div>
</div>
</div>

<br><br><br><br><br><br><br><br><br><br><br><br><br><br>
@endsection
