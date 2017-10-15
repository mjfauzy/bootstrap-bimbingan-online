
<?php

require '_header.php';
include "../koneksi.php";
?>
<div class="form-horizontal">
<fieldset>

<!-- Form Name -->
<legend>Form Input Jadwal</legend>

						<div class="modal-body">
          				<form action="proses_simpan_jadwal.php" name="modal_popup" enctype="multipart/form-data" method="POST">

							<!-- Text input-->
							<div class="form-group">
							  <label class="col-md-4 control-label" for="tgl_daftar_skripsi">Tanggal Daftar Skripsi</label>  
							  <div class="col-md-4">
							  <input id="tgl_daftar_skripsi" name="tgl_daftar_skripsi" type="text"  class="form-control input-md"required > 
							  </div>
							</div>

							<div class="form-group">
							  <label class="col-md-4 control-label" for="tgl_daftar_sidang">Tanggal Pendaftaran Sidang</label>  
							  <div class="col-md-4">
							  <input id="tgl_daftar_sidang" name="tgl_daftar_sidang" type="text"  class="form-control input-md" required> 
							  </div>
							</div>

							<!-- Text input-->
							<div class="form-group">
							  <label class="col-md-4 control-label" for="tgl_sidang">Tanggal Pelaksanaan Sidang</label>  
							  <div class="col-md-4">
							  <input id="tgl_sidang" name="tgl_sidang" type="text"  class="form-control input-md" required>
							  </div>
							</div>

							<div class="form-group">
							  <label class="col-md-4 control-label" for="tgl_daftar_wisuda">Tanggal Pendaftaran Wisuda</label>  
							  <div class="col-md-4">
							  <input id="tgl_daftar_wisuda" name="tgl_daftar_wisuda" type="text"  class="form-control input-md" required> 
							  </div>
							</div>

							<div class="form-group">
							  <label class="col-md-4 control-label" for="tgl_wisuda">Tanggal Pelaksanaan Wisuda</label>  
							  <div class="col-md-4">
							  <input id="tgl_wisuda" name="tgl_wisuda" type="text"  class="form-control input-md" required> 
							  </div>
							</div>
							<!-- Button -->
							<div class="form-group">
							  <label class="col-md-4 control-label" for="Simpan"></label>
							  <div class="col-md-4"><div class="modal-footer">
                				<button class="btn btn-success" type="submit"><span class="glyphicon glyphicon-floppy-disk"></span> Simpan</button>                
                				<button type="reset" class="btn btn-danger"  data-dismiss="modal" aria-hidden="true"><span class="glyphicon glyphicon-ban-circle"></span> Tutup</button>
              				</div>
				</form>
  </div>
</div>

</fieldset>
</div>