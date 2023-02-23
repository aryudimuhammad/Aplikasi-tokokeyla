@extends('layouts.backend.app')
@section('title') Pesanan @endsection
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
      <div class="container-fluid">
            <div class="card">
            <div class="card-header">
                    <div class="dropdown">
                        <button class="btn btn-outline-info dropdown-toggle" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span><i class="feather icon-printer"></i> Cetak Data</span>
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                            <button class="dropdown-item" target="_blank" data-toggle="modal" data-target="#modalcetakkeuangan">Cetak Keuangan</button>
                        </div>
                    </div>
                </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>No</th>
                    <th>Customer</th>
                    <th>Notransaksi</th>
                    <th>Metode</th>
                    <th>Status</th>
                    <th>Ongkir</th>
                    <th>Bukti</th>
                    <th>Aksi</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($data as $d)
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$d->user->name}}</td>
                    <td>{{$d->notransaksi}}</td>
                    <td>{{$d->metode_pembayaran}}</td>
                    @if ($d->status == 1)
                    <td> <button class="btn btn-sm btn-outline-secondary" data-bs-toggle="modal" data-bs-target="#closeModal">Verifikasi</button></td>
                    @elseif ($d->status == 2)
                    <td><button class="btn btn-outline-primary btn-sm" data-bs-toggle="modal" data-bs-target="#tunggubayarModal">Terverifikasi</button></td>
                    @elseif ($d->status == 3)
                    <td><button type="button" class="btn btn-outline-info" data-toggle="modal" data-id="{{$d->id}}" data-target="#perludikirim">Perlu dikirim</button></td>
                    @elseif ($d->status == 4)
                    <td><button class="btn btn-sm btn-outline-info">Proses Dikirim</button></td>
                    @else
                    <td><button class="btn btn-sm btn-secondary">Terjual</button></td>
                    @endif


                    @if ($d->ongkir == null)
                    <td><button type="button" class="btn btn-outline-info" data-toggle="modal" data-id="{{$d->id}}" data-target="#exampleModal">Ongkir</button></td>
                    @else
                    <td>Rp.{{number_format($d->ongkir, 0, ',', '.') }},-</td>
                    @endif


                    @if ($d->bukti == null)
                        <td>-</td>
                        @else
                        <td><img src="{{asset('storage/' . $d->bukti)}}" style="height:50px; width:auto;" class="product-image" alt="Product Image"></td>
                    @endif

                    <td>
                        <!-- <a href="" class="btn btn-xs btn-warning text-white"><i class="fa-solid fa-print"></i></a> -->
                        <a class="btn btn-xs btn-info" href="{{ route ('adminpesanandetail' , ['id' => $d->notransaksi])}}"><i class="fa-solid fa-eye"></i></a>
                        <button data-target="#modaldelete" data-toggle="modal" type="button" class="delete btn btn-xs bg-danger" data-link="{{ route('adminpesanandelete',$d->notransaksi) }}"> <i class="fa-solid fa-trash"></i></button>
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

@include('admin.pesanan.delete')
@include('admin.pesanan.ongkir')
@include('admin.pesanan.perludikirim')
@include('admin.pesanan.cetakkeuangan')
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

<script>
    $('#exampleModal').on('show.bs.modal', function(event) {
        let button = $(event.relatedTarget)
        let id = button.data('id')
        let modal = $(this)

        modal.find('.modal-body #id').val(id)
    })
</script>

<script>
    $('#perludikirim').on('show.bs.modal', function(event) {
        let button = $(event.relatedTarget)
        let id = button.data('id')
        let modal = $(this)

        modal.find('.modal-body #id').val(id)
    })
</script>
@endsection
