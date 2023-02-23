<!-- estimasi -->
<div class="modal fade" id="perludikirim" tabindex="-1" aria-labelledby="perludikirimLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="perludikirimLabel">Estimasi</h5>
      </div>
      <div class="modal-body">
      <form method="POST" action="{{route('estimasiadminpesanan')}}">
                <div class="modal-body">
                    @csrf
                    <input type="text" hidden id="id" name="id">
                    <div class="form-group">
                        <label for="estimasi">Estimasi</label>
                        <input type="text" class="form-control" id="estimasi" name="estimasi" placeholder="Masukkan Estimasi Pengiriman" value="{{old('estimasi')}}">
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div>
  </div>
</div>
