@extends('layouts.backend.app')
@section('title') Produk @endsection
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
        <h1 class="m-0">Produk</h1>
        </div>
        <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Produk</a></li>
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
                        <button class="btn btn-outline-info dropdown-toggle" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span><i class="feather icon-printer"></i> Cetak Data</span>
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                    <a class="dropdown-item" target="_blank" href="{{route('cetakproduk')}}">Cetak Produk</a>
                                    <button class="dropdown-item" target="_blank" data-toggle="modal" data-target="#modalcetaktglmasuk">Barang Masuk</button>
                                    <button class="dropdown-item" target="_blank" data-toggle="modal" data-target="#modalcetaktglkeluar">Barang Keluar/Terjual</button>
                                    <a class="dropdown-item" target="_blank" href="{{route('cetakterlaris')}}" target="_blank">Barang Terlaris</a>
                        </div>
                    </div>
                </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th scope="col" class="text-center">No</th>
                    <th scope="col" class="text-center">Produk</th>
                    <th scope="col" class="text-center">Kategori</th>
                    <th scope="col" class="text-center">Satuan</th>
                    <th scope="col" class="text-center">Stok</th>
                    <th scope="col" class="text-center">Harga</th>
                    <th scope="col" class="text-center">Aksi</th>
                  </tr>
                  </thead>
                  <tbody>
                  @foreach ($data as $d)
                    <tr>
                        <td scope="col" class="text-center">{{ $loop->iteration }}</td>
                        <td scope="col" class="text-center">{{ $d->nama_barang }}</td>
                        <td scope="col" class="text-center">{{ $d->kategori->nama_kategori }}</td>
                        <td scope="col" class="text-center">{{ $d->pcs }} {{ $d->satuan->nama_satuan }}</td>
                        <td scope="col" class="text-center">{{ $d->stok }}</td>
                        <td scope="col" class="text-center">Rp. {{number_format($d->harga, 0, ',', '.') }},-</td>
                        <td scope="col" class="text-center">
                            <a class="btn btn-sm btn-info text-white" data-id="{{$d->id}}" data-nama_barang="{{$d->nama_barang}}" data-kateogri="{{$d->kateogri_id}}" data-satuan="{{$d->satuan_id}}" data-stok="{{$d->stok}}" data-harga="{{$d->harga}}" data-toggle="modal" data-target="#editModal"><i class="fa fa-pencil color-muted m-r-5"></i></a>
                            <button data-target="#modaldelete" data-toggle="modal" type="button" class="delete btn btn-sm bg-danger" data-link="{{ route('produkdelete',$d->id) }}"> <i class="fa-solid fa-trash"></i></button>
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
@include('admin.produk.create')
@include('admin.produk.edit')
@include('admin.produk.delete')
@include('admin.produk.cetaktglmasuk')
@include('admin.produk.cetaktglkeluar')
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
        let nama_barang = button.data('nama_barang')
        let kategori_id = button.data('kategori_id')
        let satuan_id = button.data('satuan_id')
        let supplier_id = button.data('supplier_id')
        let stok = button.data('stok')
        let harga = button.data('harga')
        let modal = $(this)

        modal.find('.modal-body #id').val(id)
        modal.find('.modal-body #nama_barang').val(nama_barang);
        modal.find('.modal-body #kategori_id').val(kategori_id);
        modal.find('.modal-body #satuan_id').val(satuan_id);
        modal.find('.modal-body #supplier_id').val(supplier_id);
        modal.find('.modal-body #stok').val(stok);
        modal.find('.modal-body #harga').val(harga);

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

