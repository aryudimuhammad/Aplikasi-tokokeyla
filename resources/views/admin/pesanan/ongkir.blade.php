<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Harga Ongkir</h5>
      </div>
      <div class="modal-body">
      <form method="POST" action="{{route('ongkiradminpesanan')}}">
                <div class="modal-body">
                    @csrf
                    <input type="text" hidden id="id" name="id">
                    <div class="form-group">
                        <label for="ongkir">Ongkir</label>
                        <input type="number" class="form-control" id="ongkir" name="ongkir" placeholder="Masukkan Harga Ongkir" value="{{old('nama')}}">
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                <button type="submit" class="btn btn-primary">Save changes</button>
            </div>
        </form>
    </div>
  </div>
</div>
