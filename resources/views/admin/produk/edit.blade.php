<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="edit-modal-label"
    aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="edit-modal-label" style="padding-left: 10px;">Edit Barang</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" enctype="multipart/form-data">
                    {{ method_field('put') }}
                    @csrf
                    <div class=" modal-body">
                        <input type="hidden" name="id" id="id">
                        <div class="form-group">
                            <label class="col-form-label" for="nama_barang">Nama Barang</label>
                            <input type="text" class="form-control @error ('nama_barang') is-invalid @enderror"
                                placeholder="Masukkan Nama Barang" name="nama_barang" value="{{old('nama_barang')}}"
                                id="nama_barang" autofocus>
                            @error('nama_barang')<div class="invalid-feedback"> {{$message}} </div>@enderror
                        </div>

                        <div class="form-group">
                            <label for="kategori_id">Kategori</label>
                            <select class="custom-select" name="kategori_id" id="kategori_id">
                                @foreach($kategori as $d)
                                <option value="{{$d->id}}">{{$d->nama_kategori}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="satuan_id">Satuan</label>
                            <select class="custom-select" name="satuan_id" id="satuan_id">
                                @foreach($satuan as $d)
                                <option value="{{$d->id}}" placeholder="Masukkan Satuan">{{$d->nama_satuan}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="supplier_id">Supplier</label>
                            <select class="custom-select" name="supplier_id" id="supplier_id">
                                @foreach($supplier as $s)
                                <option value="{{$s->id}}">{{ $s->nama_supplier}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label class="col-form-label" for="stok">Stok</label>
                            <input type="text" class="form-control @error ('stok') is-invalid @enderror"
                                placeholder="Masukkan Stok" name="stok" value="{{old('stok')}}"
                                id="stok" autofocus>
                            @error('stok')<div class="invalid-feedback"> {{$message}} </div>@enderror
                        </div>

                        <div class="form-group">
                            <label class="col-form-label" for="harga">Harga</label>
                            <input type="text" class="form-control @error ('harga') is-invalid @enderror"
                                placeholder="Masukkan Harga" name="harga" value="{{old('harga')}}"
                                id="harga" autofocus>
                            @error('harga')<div class="invalid-feedback"> {{$message}} </div>@enderror
                        </div>

                        <label for="gambar">gambar</label>
                        <div class="form-group">
                            <input type="file" class="form-control" id="gambar" name="gambar" value="{{old('gambar')}}">
                        </div>
                        <br>

                    </div>
                    <div class="edit modal-footer">
                        <button type="button" class="btn btn-secondary text-white" data-dismiss="modal">Close</button>
                        <button type="submit" class="edit btn btn-primary">Ubah</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
