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
                <img class="profile-user-img img-fluid img-circle"
                    src="../../dist/img/user4-128x128.jpg"
                    alt="User profile picture">
            </div>

            <h3 class="profile-username text-center">Nina Mcintire</h3>

            <p class="text-muted text-center">Software Engineer</p>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->

        <!-- About Me Box -->
        <div class="card card-primary">
            <div class="card-header">
            <h3 class="card-title">About Me</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
            <strong><i class="fas fa-book mr-1"></i> Education</strong>

            <p class="text-muted">
                B.S. in Computer Science from the University of Tennessee at Knoxville
            </p>

            <hr>

            <strong><i class="fas fa-map-marker-alt mr-1"></i> Location</strong>

            <p class="text-muted">Malibu, California</p>

            <hr>

            <strong><i class="fas fa-pencil-alt mr-1"></i> Skills</strong>

            <p class="text-muted">
                <span class="tag tag-danger">UI Design</span>
                <span class="tag tag-success">Coding</span>
                <span class="tag tag-info">Javascript</span>
                <span class="tag tag-warning">PHP</span>
                <span class="tag tag-primary">Node.js</span>
            </p>

            <hr>

            <strong><i class="far fa-file-alt mr-1"></i> Notes</strong>

            <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam fermentum enim neque.</p>
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
                    <label for="inputName" class="col-sm-2 col-form-label">Name</label>
                    <div class="col-sm-10">
                        <input type="email" class="form-control" id="inputName" placeholder="Name">
                    </div>
                    </div>
                    <div class="form-group row">
                    <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
                    <div class="col-sm-10">
                        <input type="email" class="form-control" id="inputEmail" placeholder="Email">
                    </div>
                    </div>
                    <div class="form-group row">
                    <label for="inputName2" class="col-sm-2 col-form-label">Name</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="inputName2" placeholder="Name">
                    </div>
                    </div>
                    <div class="form-group row">
                    <label for="inputExperience" class="col-sm-2 col-form-label">Experience</label>
                    <div class="col-sm-10">
                        <textarea class="form-control" id="inputExperience" placeholder="Experience"></textarea>
                    </div>
                    </div>
                    <div class="form-group row">
                    <label for="inputSkills" class="col-sm-2 col-form-label">Skills</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="inputSkills" placeholder="Skills">
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
    <br><br><br><br><br>
@endsection
