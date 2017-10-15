<?php

require '_header.php';

?>

				<h2>Data Peserta Skripsi</h2>
				<hr>
				
				<p>
				<form action='proses_simpan_pembimbing.php' method='GET'>
					<table id="dataPeserta" class="table table-bordered table-hover table-striped">
						<thead>
							<tr>
								<th>No.</th>
								<th>NIM</th>
								<th>Nama</th>
								<th>Judul Skripsi</th>
								<th>Dosen Pembimbing</th>
							</tr>
						</thead>
						<tbody>
							<?php
							$result = mysqli_query($connect,"SELECT * FROM tb_daftar ORDER BY nim");
							if ($result) {
								if ($result->num_rows > 0) {
									$no=0;
									while ($row = $result->fetch_object()) {
										$no++;
										?>
										<tr>
											<td class="text-center"><?php echo $no."."; ?></td>
											<td class="text-center"><?php echo $row->nim; ?></td>
											<?php
												$q_mahasiswa = mysqli_query($connect,"SELECT nama FROM tb_mahasiswa WHERE nim='".$row->nim."'");
												if($q_mahasiswa) {
													if($q_mahasiswa->num_rows > 0) {
														$r_mahasiswa = $q_mahasiswa->fetch_object();
														$nama_mahasiswa = $r_mahasiswa->nama;
													}
												}
											?>
											<td><a href="#" class="open_detail_mahasiswa" data-target="#ModalDetailMhs" data-toggle="modal" id="<?php echo $row->nim; ?>" title="Detail Mahasiswa"><?php echo $nama_mahasiswa; ?></a></td>
											<td><?php echo $row->judul; ?></td>
											<?php
												$q_dospem = mysqli_query($connect,"SELECT nama FROM tb_dosen WHERE nidn='".$row->nidn."'");
												if($q_dospem) {
													if($q_dospem->num_rows > 0) {
														$r_dospem = $q_dospem->fetch_object();
														$nama_dospem = $r_dospem->nama;
														$nidn = $row->nidn;
													}
												}
											?>
											<td><a href="#" class="open_detail_dosen" data-target="#ModalDetailDosen" data-toggle="modal" id="<?php echo $nidn; ?>" title="Detail Dosen"><?php echo $nama_dospem." (".$nidn.")"; ?></a></td>
										</tr>
							<?php
									}
								}
							}
							$connect->close(); 
							$result->close(); 
							?>
						</tbody>
					</table> <!--
					<div class="col-md-12 text-right">
						<button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-floppy-disk"></span> Simpan</button>
					</div> -->
				</form>
				</p>
			</div>

		<!-- Modal Popup untuk Add--> 
		<div id="ModalAdd" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
			<div class="modal-dialog">
    			<div class="modal-content">

        			<div class="modal-header">
            			<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            			<h4 class="modal-title" id="myModalLabel">Tambah Data Mahasiswa</h4>
        			</div>

        			<div class="modal-body">
          				<form action="proses_simpan_mahasiswa.php" name="modal_popup" enctype="multipart/form-data" method="POST">
            
                			<div class="form-group" style="padding-bottom: 20px;">
                  				<label for="nim">NIM</label>
                  				<input type="text" name="nim"  class="form-control" required />
                			</div>

                			<div class="form-group" style="padding-bottom: 20px;">
                  				<label for="nama">Nama</label>
                  				<input type="text" name="nama"  class="form-control" required />
                			</div>

                			<div class="form-group" style="padding-bottom: 20px;">
                  				<label for="No. Telp">No. Telp</label>
                  				<input type="text" name="no_telp"  class="form-control" required />
                			</div>
							
                			<div class="form-group" style="padding-bottom: 20px;">
                  				<label for="sks">Jumlah SKS</label>
                  				<input type="text" name="sks"  class="form-control" required />
                			</div>


                			<div class="form-group" style="padding-bottom: 20px;">
                  				<label for="ipk">Jumlah IPK</label>
                  				<input type="text" name="ipk"  class="form-control" required />
                			</div>	

							
                			<div class="form-group" style="padding-bottom: 20px;">
                  				<label for="judul_skripsi">Judul Skripsi</label>
                  				<textarea type="text" name="judul_skripsi"  class="form-control" required></textarea>
                			</div>
							

              				<div class="modal-footer">
                				<button class="btn btn-success" type="submit"><span class="glyphicon glyphicon-floppy-disk"></span> Simpan</button>                
                				<button type="reset" class="btn btn-danger"  data-dismiss="modal" aria-hidden="true"><span class="glyphicon glyphicon-ban-circle"></span> Tutup</button>
              				</div>
              			</form>

            		</div>
        		</div>
    		</div>
		</div>

		<!-- Modal Popup untuk Edit--> 
		<div id="ModalEdit" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">

		</div>

		<!-- Modal Popup untuk detail mahasiswa -->
		<div id="ModalDetailMhs" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">

		</div>

		<!-- Modal Popup untuk detail dosen -->
		<div id="ModalDetailDosen" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">

		</div>

		<!-- Modal Popup untuk delete--> 
		<div class="modal fade" id="ModalDelete">
  			<div class="modal-dialog">
    			<div class="modal-content" style="margin-top:100px;">
      				<div class="modal-header">
        				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        				<h4 class="modal-title" style="text-align:center;">Anda Yakin Ingin Menghapus Data Ini?</h4>
      				</div>         
	      			<div class="modal-footer" style="margin:0px; border-top:0px; text-align:center;">
	        			<a href="#" class="btn btn-primary" id="delete_link"><span class="glyphicon glyphicon-ok-sign"></span> Ya</a>
	        			<button type="button" class="btn btn-danger" data-dismiss="modal"><span class="glyphicon glyphicon-remove-sign"></span> Tidak</button>
	      			</div>
    			</div>
  			</div>
		</div>


		<!-- Javascript untuk popup modal Edit, Detail Mahasiswa dan Dosen--> 
		<script type="text/javascript">
   			$(document).ready(function () {
   				$(".open_modal_edit").click(function(e) {
      				var m = $(this).attr("id");
       				$.ajax({
             			url: "modal_edit_mahasiswa.php",
             			type: "GET",
             			data : {id: m,},
             			success: function (ajaxData){
               				$("#ModalEdit").html(ajaxData);
               				$("#ModalEdit").modal('show',{backdrop: 'true'});
             			}
           			});
        		});
      		});

      		$(document).ready(function () {
      			$(".open_detail_mahasiswa").click(function(e) {
      				var m = $(this).attr("id");
      				$.ajax({
      					url: "modal_detail_mahasiswa.php",
      					type: "GET",
      					data: {id: m,},
      					success: function (ajaxData) {
      						$("#ModalDetailMhs").html(ajaxData);
      						$("#ModalDetailMhs").modal('show',{backdrop: 'true'});
      					}
      				});
      			});
      		});

      		$(document).ready(function() {
      			$(".open_detail_dosen").click(function() {
      				var m = $(this).attr("id");
      				$.ajax({
      					url: "modal_detail_dosen.php",
      					type: "GET",
      					data: {id: m,},
      					success: function (ajaxData) {
      						$("#ModalDetailDosen").html(ajaxData);
      						$("#ModalDetailDosen").modal('show',{backdrop: 'true'});
      					}
      				});
      			});
      		});

      		function confirm_delete(delete_url){
      			$('#ModalDelete').modal('show', {backdrop: 'static'});
      			document.getElementById('delete_link').setAttribute('href' , delete_url);
    		}

    		$(function() {
    			$("#dataPeserta").dataTable();
    		});
		</script>

<?php

require '_footer.php';

?>