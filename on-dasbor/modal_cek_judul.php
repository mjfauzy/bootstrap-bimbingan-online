
<?php

require '_header.php';
include "../koneksi.php";
?>
<div class="form-horizontal">
<fieldset>

<!-- Form Name -->
<legend><h1>Silahkan Cek Judul Skripsi Anda !</h1></legend>

						<div class="modal-body">
          				<form action="proses_simpan_jadwal.php" name="modal_popup" enctype="multipart/form-data" method="POST">

							<!-- Text input-->
							<div class="form-group">
							  <label class="col-md-4 control-label" for="cari_judul">Cari Judul Skripsi</label>  
							  <div class="col-md-4">
							  <input id="cari_judul" name="cari_judul" type="text"  class="form-control input-md"required > 
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

<div class="col-md-12">
				<table id="dataskripsi" class="table table-bordered table-hover table-striped">
						<thead>
							<tr>
								<th>No.</th>
								<th>Kode Judul</th>
								<th>Judul Skripsi Yang Sudah Ada</th>
								<th>Nama</th>
								<th>Tahun</th>
							</tr>
						</thead>
						<tbody>
							<?php
							$result = mysqli_query($connect,"SELECT * FROM tb_data_judul ORDER BY judul_skripsi");
							if ($result) {
								if ($result->num_rows > 0) {
									$no=0;
									while ($row = $result->fetch_object()) {
										$no++;
										?>
										<tr>
											<td><?php echo $no."."; ?></td>
											<td><?php echo $row->kd_judul; ?></td>
											<td><?php echo $row->judul_skripsi; ?></td>
											<td><?php echo $row->nama; ?></td>
											<td><?php echo $row->tahun; ?></td>
											
											</tr>
							<?php
									}
								}
							}
							$connect->close(); 
							?>
						</tbody>
					</table>
					
</div>
