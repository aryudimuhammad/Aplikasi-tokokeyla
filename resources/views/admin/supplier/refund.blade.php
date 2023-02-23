<!-- Modal -->
<div class="modal fade" id="refundModal" tabindex="-1" aria-labelledby="refundModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="refundModalLabel">Tambah Data</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
                <form method="post" action="{{route ('supplierrefund')}}">
                    @csrf
                    <div class="form-group">
                        <label for="refund">Masukkan Jumlah Barang Yang ingin di Refund</label>
                        <input type="text" class="form-control" id="refund" name="refund" placeholder="Masukkan Jumlah Barang Yang ingin di Refund" value="{{old('refund')}}">
                        <input type="text" id="id" hidden name="id">
                    </div>
                    <div class="refund modal-footer">
                        <button type="button" class="btn btn-secondary text-white" data-dismiss="modal">Close</button>
                        <button type="submit" class="refund btn btn-primary">Ubah</button>
                    </div>
                </form>
            </div>
    </div>
  </div>
</div>






