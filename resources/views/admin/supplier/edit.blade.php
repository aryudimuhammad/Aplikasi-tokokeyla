<!-- Modal -->
<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editModalLabel">Tambah Data</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
                <form method="post">
                    {{ method_field('put') }}
                    @csrf
                    <div class=" modal-body">
                        <input type="hidden" name="id" id="id">
                        <div class="form-group">
                            <label class="col-form-label" for="name">Nama Supplier</label>
                            <input type="text" class="form-control @error ('name') is-invalid @enderror" placeholder="Masukkan Nama" name="name" value="{{old('name')}}" id="name" autofocus>
                        </div>
                        <div class="form-group">
                            <label class="col-form-label" for="email">E-Mail</label>
                            <input type="text" class="form-control @error ('email') is-invalid @enderror" placeholder="Masukkan E-Mail" name="email" value="{{old('email')}}" id="email" autofocus>
                        </div>
                        <div class="form-group">
                            <label class="col-form-label" for="telepon">Telepon</label>
                            <input type="text" class="form-control @error ('telepon') is-invalid @enderror" placeholder="Masukkan Telepon" name="telepon" value="{{old('telepon')}}" id="telepon" autofocus>
                        </div>
                        <div class="form-group">
                            <label class="col-form-label" for="alamat">Alamat</label>
                            <input type="text" class="form-control @error ('alamat') is-invalid @enderror" placeholder="Masukkan Alamat" name="alamat" value="{{old('alamat')}}" id="alamat" autofocus>
                        </div>
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






