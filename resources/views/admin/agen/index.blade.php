@extends('layouts.backend.app')
@section('title') Customer @endsection
@section('head')
<link rel="stylesheet" href="{{asset('plugins/fontawesome-free/css/all.min.css')}}">
<link rel="stylesheet" href="{{asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">
@endsection
@section('content')

<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Customer</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Customer</a></li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
<section class="content">
      <div class="container-fluid">
            <div class="card">
              <div class="card-header">
                  <button type="button" class="btn btn-outline-info" data-toggle="modal" data-target="#exampleModal">Tambah Data</button>
                  <a href="#" class="btn btn-outline-info">Cetak</a>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>No</th>
                    <th>Nama Customer</th>
                    <th>E-Mail</th>
                    <th>Nomor Telepon</th>
                    <th>Alamat</th>
                    <th>Aksi</th>
                  </tr>
                  </thead>
                  <tbody>
                @foreach ($data as $d)
                  <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$d->name}}</td>
                    <td>{{$d->email}}</td>
                    <td>{{$d->telepon}}</td>
                    <td>{{$d->alamat}}</td>
                    <td>
                    <!-- <a class="btn btn-xs btn-info text-white" href="{{route('supplierdetail',['id' => $d->id])}}">Lihat Produk</a> -->
                    <button class="btn btn-sm btn-info" data-id="{{$d->id}}" data-name="{{$d->name}}" data-email="{{$d->email}}" data-alamat="{{$d->alamat}}" data-telepon="{{$d->telepon}}" data-toggle="modal" data-target="#editModal"><i class="fa fa-pencil color-muted m-r-5"></i></button>
                    <button data-target="#modaldelete" data-toggle="modal" type="button" class="delete btn btn-sm bg-danger" data-link="{{ route('agendelete',$d->id) }}"> <i class="fa-solid fa-trash"></i></button>
                    </td>
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

@include('admin.agen.create')
@include('admin.agen.edit')
@include('admin.agen.delete')
@endsection
@section('script')
<script src="{{asset('plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{asset('plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{asset('plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
<script src="{{asset('plugins/datatables-buttons/js/dataTables.buttons.min.js')}}"></script>
<script src="{{asset('plugins/datatables-buttons/js/buttons.bootstrap4.min.js')}}"></script>
<script src="{{asset('plugins/jszip/jszip.min.js')}}"></script>
<script src="{{asset('plugins/pdfmake/pdfmake.min.js')}}"></script>
<script src="{{asset('plugins/pdfmake/vfs_fonts.js')}}"></script>
<script src="{{asset('plugins/datatables-buttons/js/buttons.html5.min.js')}}"></script>
<script src="{{asset('plugins/datatables-buttons/js/buttons.print.min.js')}}"></script>
<script src="{{asset('plugins/datatables-buttons/js/buttons.colVis.min.js')}}"></script>
<script src="{{asset('dist/js/adminlte.min.js')}}"></script>
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>

<script>
    $('#editModal').on('show.bs.modal', function(event) {
        let button = $(event.relatedTarget)
        let id = button.data('id')
        let name = button.data('name')
        let email = button.data('email')
        let alamat = button.data('alamat')
        let telepon = button.data('telepon')
        let modal = $(this)

        modal.find('.modal-body #id').val(id)
        modal.find('.modal-body #name').val(name);
        modal.find('.modal-body #email').val(email);
        modal.find('.modal-body #alamat').val(alamat);
        modal.find('.modal-body #telepon').val(telepon);
    })
</script>

<script>
    $('.delete').on('click', function(){
    var link = $(this).data('link');
    $('#formDelete').attr('action',link)
    });
</script>
@endsection
