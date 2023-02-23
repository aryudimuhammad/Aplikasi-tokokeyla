@extends('layouts.backend.app')
@section('title') Satuan @endsection
@section('head')
<link rel="stylesheet" href="{{asset('plugins/fontawesome-free/css/all.min.css')}}">
<link rel="stylesheet" href="{{asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">
@endsection
@section('content')
<div class="content-header">
    <div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
        <h1 class="m-0">Satuan</h1>
        </div>
        <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Satuan</a></li>
        </ol>
        </div>
    </div>
    </div>
</div>


<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <div class="dropdown">
                        <button class="btn btn-outline-info" data-toggle="modal" data-target="#modalTambah">
                            <span><i class="feather icon-plus"></i> Tambah Data</span>
                        </button>
                        &emsp14;
                        <a class="btn btn-outline-info" target="_blank" href="{{route('cetaksatuan')}}">Cetak Satuan</a>
                    </div>
                </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th scope="col" class="text-center">No</th>
                    <th scope="col" class="text-center">Nama Satuan</th>
                    <th scope="col" class="text-center">Aksi</th>
                  </tr>
                  </thead>
                  <tbody>
                  @foreach ($data as $d)
                    <tr>
                        <td scope="col" class="text-center">{{ $loop->iteration }}</td>
                        <td scope="col" class="text-center">{{ $d->nama_satuan }}</td>
                        <td scope="col" class="text-center">
                            <a class="btn btn-sm btn-info text-white" data-id="{{$d->id}}" data-nama_satuan="{{$d->nama_satuan}}" data-toggle="modal" data-target="#editModal">
                                <i class="fa fa-pencil color-muted m-r-5"></i>
                            </a>
                            <button data-target="#modaldelete" data-toggle="modal" type="button" class="delete btn btn-sm bg-danger" data-link="{{ route('satuandelete',$d->id) }}"> <i class="fa-solid fa-trash"></i></button>
                        </td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            </div>
        </div>
    </div>
</section>
@include('admin.satuan.create')
@include('admin.satuan.edit')
@include('admin.satuan.delete')
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
      "responsive": true,
      "autoWidth": false,
    });
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
        let nama_satuan = button.data('nama_satuan')
        let modal = $(this)

        modal.find('.modal-body #id').val(id)
        modal.find('.modal-body #nama_satuan').val(nama_satuan);
    })
</script>

<script>
    $('#editstok').on('show.bs.modal', function(event) {
        let button = $(event.relatedTarget)
        let id = button.data('id')
        let stok = button.data('stok')
        let modal = $(this)

        modal.find('.modal-body #id').val(id)
        modal.find('.modal-body #stok').val(stok);
    })
</script>

<script>
    $('.delete').on('click', function(){
    var link = $(this).data('link');
    $('#formDelete').attr('action',link)
    });
</script>
@endsection

