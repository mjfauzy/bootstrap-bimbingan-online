
<?php

require '_header.php';
include "../koneksi.php";
?>
<div class="form-horizontal">
<fieldset>
<!-- Form Name -->
<legend class="text-center">Form Pendaftaran</legend>

	<?php
		$action = "proses_simpan_pendaftaran.php";
		$terdaftar = false;
		$q_daftar = mysqli_query($connect,"SELECT * FROM tb_daftar WHERE nim='".$_SESSION['username']."'");
		if($q_daftar) {
			if($q_daftar->num_rows > 0) {
				$terdaftar = true;
				$r_daftar = $q_daftar->fetch_object();
				$kd_daftar = $r_daftar->kd_daftar;
				$no_hp = $r_daftar->no_hp;
				$sks = $r_daftar->sks;
				$ipk = $r_daftar->ipk;
				$judul = $r_daftar->judul;
				$nidn = $r_daftar->nidn;
				$status = $r_daftar->status;
				$action = "proses_update_pendaftaran.php";
			}
		}

		$q_jadwal = mysqli_query($connect,"SELECT * FROM tb_jadwal WHERE perihal='Proposal'");
		if($q_jadwal) {
			if($q_jadwal->num_rows > 0) {
				$r_jadwal = $q_jadwal->fetch_object();
				$status_jadwal = $r_jadwal->status;
				$dibuka = true;
				if($status_jadwal == 'Ditutup') {
					$dibuka = false;
				}
			}
		}
	?>


						<div class="modal-body">
          				<form action="<?php echo $action; ?>" name="modal_popup" enctype="multipart/form-data" method="POST">
									<?php if($terdaftar): ?>
									<input type="hidden" name="kd_daftar" value="<?php echo $kd_daftar; ?>" />
									<?php endif; ?>

							<!-- Text input-->
							<div class="form-group">
							  <label class="col-md-4 control-label" for="nim">NIM</label>  
							  <div class="col-md-4">
							  <input id="nim" name="nim" type="text"  class="form-control input-md" value="<?php echo $_SESSION['username']; ?>" required disabled /> 
							  </div>
							</div>

							<div class="form-group">
							  <label class="col-md-4 control-label" for="nama">Nama</label>  
							  <div class="col-md-4">
							  <input id="nama" name="nama" type="text"  class="form-control input-md" value="<?php echo $_SESSION['nama']; ?>" required disabled /> 
							  </div>
							</div>

							<!-- Text input-->
							<div class="form-group">
							  <label class="col-md-4 control-label" for="No">No. HP</label>  
							  <div class="col-md-4">
							  <input id="no_telp" name="no_hp" type="text"  class="form-control input-md" value="<?php if($terdaftar) echo $no_hp; ?>"  required <?php if($status != "Belum ACC" || !$dibuka) echo "disabled"; ?> />
							  </div>
							</div>

							<div class="form-group">
							  <label class="col-md-4 control-label" for="sks">Jumlah SKS</label>  
							  <div class="col-md-4">
							  <input id="sks" name="sks" type="text"  class="form-control input-md" value="<?php if($terdaftar) echo $sks; ?>"  required <?php if($status != "Belum ACC" || !$dibuka) echo "disabled"; ?> /> 
							  </div>
							</div>

							<div class="form-group">
							  <label class="col-md-4 control-label" for="ipk">Nilai IPK</label>  
							  <div class="col-md-4">
							  <input id="ipk" name="ipk" type="text"  class="form-control input-md" value="<?php if($terdaftar) echo $ipk; ?>"  required <?php if($status != "Belum ACC" || !$dibuka) echo "disabled"; ?>> 
							  </div>
							</div>

							<div class="form-group">
							  <label class="col-md-4 control-label" for="judul_skripsi">Judul Skripsi</label>  
							  <div class="col-md-4">
							  <input id="judul_skripsi" name="judul_skripsi" type="text"  class="form-control input-md" value="<?php if($terdaftar) echo $judul; ?>"  required <?php if($status != "Belum ACC" || !$dibuka) echo "disabled"; ?>>
							  </div>
							</div>

							<div class="form-group">
							  <label class="col-md-4 control-label" for="dospem">Dosen Pembimbing</label>  
							  <div class="col-md-4">
								<?php if($status == "Belum ACC" && $dibuka){ ?>
									<select class="form-control input-md" name="dospem" required>
										<option value="" disabled selected>-- Pilih Pembimbing --</option>
										<?php
											$q_dosen = mysqli_query($connect,"SELECT * FROM tb_dosen WHERE kuota_bimbingan NOT IN ('0')");
											if($q_dosen):
												if($q_dosen->num_rows > 0):
													while($r_dosen = $q_dosen->fetch_object()):
										?>
										<option value="<?php echo $r_dosen->nidn; ?>" 
										<?php 
											if($terdaftar){
												if($r_dosen->nidn == $nidn){
													echo "selected"; 
												}
											}
										?>
										><?php echo $r_dosen->nama." (".$r_dosen->nidn.")"; ?></option>
										<?php
													endwhile;
												endif;
											endif;
										?>
									</select>
								<?php } else { 
									$q_dosen = mysqli_query($connect,"SELECT * FROM tb_dosen WHERE nidn='$nidn'");
									if($q_dosen):
										if($q_dosen->num_rows > 0):
											$r_dosen = $q_dosen->fetch_object();								
								?>
									<input type="text" value="<?php echo $r_dosen->nama.' ('.$nidn.')'; ?>" class="form-control" disabled />
								<?php
										endif;
									endif;
								}
								?>
							  </div>
							</div>

							<!-- Button -->
							<div class="form-group">
							  <label class="col-md-4 control-label" for="Simpan"></label>
							  <div class="col-md-4"><div class="modal-footer">
								<?php if($terdaftar && $status == "Belum ACC"){ ?>
									<?php if(!$dibuka) { echo "<!--"; ?>
                				<button class="btn btn-success" type="submit"><span class="glyphicon glyphicon-pencil"></span> Update</button>
                				<?php echo "-->"; 
                						echo "<p class='text-danger'><strong>Pendaftaran Proposal Telah Ditutup</strong></p>";
                					} 
                				?>            
								<?php } elseif($terdaftar && ($status == "ACC" || $status == "Revisi")) { ?>
								<?php } else { ?>
												<button class="btn btn-success" type="submit"><span class="glyphicon glyphicon-floppy-disk"></span> Simpan</button>                
                				<button type="reset" class="btn btn-danger"><span class="glyphicon glyphicon-refresh"></span> Reset</button>
								<?php } ?>
								</div>
				</form>
				<hr />
				<p><strong>*note:</strong> Data pendaftaran masih bisa diubah sebelum H-1 sidang proposal</p>
  </div>
</div>
</fieldset>

		
		