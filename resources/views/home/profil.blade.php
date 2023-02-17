@extends('layouts.frontend.app')
@section('title') Profil @endsection
@section('content')
    <section class="content">
      <div class="container-fluid">
        <div class="row">
        <!---- form show user --->
        <div class="col-md-3">

        <!-- Profile Image -->
        <div class="card card-primary card-outline">
            <div class="card-body box-profile">
            <div class="text-center">
                @if (Auth::user()->gambar == null)
                <img class="profile-user-img img-fluid img-circle"
                    src="{{ asset ( 'img/index.png') }}"
                    alt="User profile picture">
                @else
                <img class="profile-user-img img-fluid img-circle"
                    src="{{ asset ( 'storage/' . Auth::user()->gambar) }}"
                    alt="User profile picture">
                @endif
            </div>

            <h3 class="profile-username text-center">{{ Auth::user()->name}}</h3>

            <p class="text-muted text-center">Agen</p>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->

        <!-- About Me Box -->
        <div class="card card-primary">
            <div class="card-header">
            <h3 class="card-title">Tentang Saya</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
            <strong><i class="fas fa-envelope mr-1"></i> E-Mail</strong>

            <p class="text-muted">{{ Auth::user()->email}}</p>

            <hr>

            <strong><i class="fas fa-map-marker-alt mr-1"></i> Alamat</strong>

            <p class="text-muted">{{ Auth::user()->alamat}}</p>

            <hr>

            <strong><i class="far fa-address-book mr-1"></i> Nomor Telepon</strong>

            <p class="text-muted">{{ Auth::user()->telepon}}</p>

            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
        </div>
        <!----- end form show user -------->

        <!------------- form edit ------------->
        <div class="col-md-9">
        <div class="card">
            <div class="card-body">
                <a type="button" href="{{ route ('welcome')}}" class="btn btn-outline-danger" style="float:right;">Kembali ke Halaman Awal</a>
                <h1>Edit Profil</h1>
                <br><br><br>
                <form class="form-horizontal">
                    <div class="form-group row">
                    <label for="name" class="col-sm-2 col-form-label">Nama Pengguna</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="name" name="name" placeholder="Nama Pengguna" value="{{ Auth::user()->name }}">
                    </div>
                    </div>
                    <div class="form-group row">
                    <label for="email" class="col-sm-2 col-form-label">E-mail</label>
                    <div class="col-sm-10">
                        <input type="email" class="form-control" id="email" name="email" placeholder="E-mail" value="{{ Auth::user()->email }}">
                    </div>
                    </div>
                    <div class="form-group row">
                    <label for="telepon" class="col-sm-2 col-form-label">Nomor Telepon</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="telepon" name="telepon" placeholder="Nomor Telepon" value="{{ Auth::user()->telepon}}">
                    </div>
                    </div>
                    <div class="form-group row">
                    <label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
                    <div class="col-sm-10">
                        <textarea class="form-control" id="alamat" name="alamat" placeholder="Alamat">{{ auth::user()->alamat }}</textarea>
                    </div>
                    </div>
                    <div class="form-group row">
                    <div class="offset-sm-2 col-sm-10">
                        <button type="submit" class="btn btn-danger">Edit</button>
                    </div>
                    </div>
                </form>
            </div>
            <!-- /.tab-content -->
            </div><!-- /.card-body -->
        </div>
        <!-- /.card -->
        </div>
        <!-- end form edit -->

        </div>
      </div>
    </section>
    <br><br><br><br><br><br><br><br><br>
@endsection
