
<?php

require '_header.php';
include "../koneksi.php";
?>
<div class="form-horizontal">
<fieldset>

<!-- Form Name -->
<legend>Form Input Jadwal Bimbingan</legend>

						<div class="modal-body">
          				<form action="proses_simpan_jadwal_bimbingan.php" name="modal_popup" enctype="multipart/form-data" method="POST">

							<!-- Text input-->
							<div class="form-group">
							  <label class="col-md-4 control-label" for="tgl_bimbingan">Tanggal </label>  
							  <div class="col-md-4">
							  <input id="tgl_bimbingan" name="tgl_bimbingan" type="text"  class="form-control input-md" required> 
							  </div>
							  
							</div>
							<div class="form-group">
							  <label class="col-md-4 control-label" for="jam_bimbingan">Jam </label>  
							  <div class="col-md-4">
							  <input id="jam_bimbingan" name="jam_bimbingan" type="text"  class="form-control input-md" required> 
							  </div>
							</div>

							<div class="form-group">
							  <label class="col-md-4 control-label" for="konsultasi">Konsultasi</label>  
							  <div class="col-md-4">
							  <input id="konsultasi" name="konsultasi" type="text"  class="form-control input-md" required> 
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

		
		