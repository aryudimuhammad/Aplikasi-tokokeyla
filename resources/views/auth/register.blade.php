@extends('layouts.app')
@section('title')
Form Daftar
@endsection
@section('content')
<div class="container">
    <div class="row justify-content-center">
    <div class="register-box">
                <div class="register-logo">
                    <b>Form Daftar Toko Keyla</b>
                </div>

                <div class="card">
                    <div class="card-body register-card-body">
                    <p class="login-box-msg">Register</p>

                    <form action="{{route ('register')}}" method="post">
                        @csrf
                        <div class="input-group mb-3">
                        <input type="text" class="form-control" name="name" id="name" placeholder="Nama Lengkap">
                        <div class="input-group-append">
                            <div class="input-group-text">
                            <span class="fas fa-user"></span>
                            </div>
                        </div>
                        </div>
                        <div class="input-group mb-3">
                        <input type="email" class="form-control" name="email" id="email" placeholder="E-mail">
                        <div class="input-group-append">
                            <div class="input-group-text">
                            <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                        </div>

                        <div class="input-group mb-3">
                        <input type="number" class="form-control" name="telepon" id="telepon" placeholder="Nomor Telepon">
                        <div class="input-group-append">
                            <div class="input-group-text">
                            <span class="fas fa-mobile"></span>
                            </div>
                        </div>
                        </div>

                        <div class="input-group mb-3">
                        <textarea type="text" class="form-control" name="alamat" id="alamat" placeholder="Alamat Lengkap"></textarea>
                        <div class="input-group-append">
                            <div class="input-group-text">
                            <span class="fas fa-location-arrow"></span>
                            </div>
                        </div>
                        </div>

                        <div class="input-group mb-3">
                        <input type="password" class="form-control" name="password" id="password" placeholder="Password">
                        <div class="input-group-append">
                            <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                            </div>
                        </div>
                        </div>
                        <div class="input-group mb-3">
                        <input type="password" class="form-control" name="password_confirmation" id="password_confirmation" placeholder="Retype password">
                        <div class="input-group-append">
                            <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                            </div>
                        </div>
                        </div>


                        <div class="row">
                        <!-- /.col -->
                        <div class="col-4">
                            <button type="submit" class="btn btn-primary btn-block">Register</button>
                        </div>

                        <div class="col-8">
                            <a href="{{route ('login')}}" class="text-center"><small>Sudah Punya Akun!!</small></a>
                        </div>
                        <!-- /.col -->
                        </div>
                    </form>


                    </div>
                    <!-- /.form-box -->
                </div><!-- /.card -->
    </div>
    </div>
</div>
@endsection
