@extends('layouts.backend.app')
@section('title') Supplier @endsection
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
        <h1>Detail Supplier {{$data->nama_supplier}}</h1>
        </div>
        <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Supplier</a></li>
            <li class="breadcrumb-item"><a href="#">Detail Supplier</a></li>
        </ol>
        </div>
    </div>
    </div><!-- /.container-fluid -->
</section>
<section class="content">
      <div class="container-fluid">
            <div class="card">
              <div class="card-header">
                 <a style="float: left;" target="_blank" href="{{ route ('cetaksuppliersatuan',['id' => $data->id])}}" class="btn btn-outline-info">Cetak Data</a>
                 <a style="float: right;" href="{{ route('supplierindex')}}" class="btn btn-outline-danger">Kembali</a>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>No</th>
                    <th>Nama Produk</th>
                    <th>Kategori</th>
                    <th>Satuan</th>
                    <th>Harga</th>
                    <th>Jumlah Produk</th>
                    <th>Aksi</th>
                  </tr>
                  </thead>
                  <tbody>
                @foreach ($produk as $d)
                  <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$d->nama_barang}}</td>
                    <td>{{$d->kategori->nama_kategori}}</td>
                    <td>{{$d->pcs}} {{$d->satuan->nama_satuan}}</td>
                    <td>{{$d->harga}}</td>
                    <td>{{$d->stok}}</td>
                    <td>
                        <button class="btn btn-sm btn-warning text-white" data-id="{{$d->id}}" data-toggle="modal" data-target="#refundModal"><i class="fa fa-pencil color-muted m-r-5"></i> Refund</button>
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

@include('admin.supplier.create')
@include('admin.supplier.edit')
@include('admin.supplier.delete')
@include('admin.supplier.refund')
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
        let nama_supplier = button.data('nama_supplier')
        let email = button.data('email')
        let alamat = button.data('alamat')
        let telepon = button.data('telepon')
        let modal = $(this)

        modal.find('.modal-body #id').val(id)
        modal.find('.modal-body #nama_supplier').val(nama_supplier);
        modal.find('.modal-body #email').val(email);
        modal.find('.modal-body #alamat').val(alamat);
        modal.find('.modal-body #telepon').val(telepon);
    })
</script>

<script>
    $('#refundModal').on('show.bs.modal', function(event) {
        let button = $(event.relatedTarget)
        let id = button.data('id')
        let modal = $(this)

        modal.find('.modal-body #id').val(id)
    })
</script>

<script>
    $('.delete').on('click', function(){
    var link = $(this).data('link');
    $('#formDelete').attr('action',link)
    });
</script>
@endsection
