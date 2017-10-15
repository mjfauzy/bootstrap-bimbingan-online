<?php

require '_header.php';

?>
		<link rel="stylesheet" href="../jquery-ui-1.12.1.custom/jquery-ui.css">
		<script src="../jquery-ui-1.12.1.custom/jquery-ui.js"></script>
		<script>
			$( function() {
				$( ".datepicker" ).datepicker();
			} );
		</script>

			<div class="col-md-12">
				<h2>Data Jadwal Kegiatan</h2>
				<hr>
				<p>
					<a href='#' class='btn btn-primary glyphicon glyphicon-plus' data-target='#ModalAdd' data-toggle='modal' title='Tambah Data User'></a>
				</p>
				<p>
					<table id="dataJadwal" class="table table-bordered table-hover table-striped">
						<thead>
							<tr>
								<th>No.</th>
								<th>Kegiatan</th>
								<th>Tanggal</th>
								<th>Kategori</th>
								<th>Status</th>
								<th>Aksi</th>
							</tr>
						</thead>
						<tbody>
							<?php
							$result = mysqli_query($connect,"SELECT * FROM tb_jadwal ORDER BY tanggal");
							if ($result) {
								if ($result->num_rows > 0) {
									while ($row = $result->fetch_object()) {
										STATIC $no = 0;
										?>
										<tr>
											<td class="text-center"><?php echo ++$no."."; ?></td>
											<td><?php echo $row->kegiatan; ?></td>
											<td class="text-center"><?php echo $row->tanggal; ?></td>
											<td class="text-center"><?php echo $row->kategori; ?></td>
											<td class="text-center"><?php echo $row->status; ?></td>
											<td class="text-center">
												<?php if($row->kategori != 'Informasi' && $row->status != 'Ditutup'): ?>
												<a href='#' class="btn btn-primary" data-target='#ModalTutup' data-toggle='modal' onclick="confirm_tutup('proses_tutup_jadwal.php?id=<?php echo $row->id_jadwal; ?>');" title='Tutup Jadwal'>Tutup</a>
												<?php endif; ?>
												<?php if($row->status != 'Ditutup'): ?>
												<a href='#' class='open_modal_edit btn btn-success glyphicon glyphicon-pencil' data-target='#ModalEdit' data-toggle='modal' id="<?php echo $row->id_jadwal; ?>" title='Edit Data Jadwal'></a>  
												<?php endif; ?>
												<a href='#' class='btn btn-danger glyphicon glyphicon-trash' data-target='#ModalDelete' data-toggle='modal' onclick="confirm_delete('proses_hapus_jadwal.php?id=<?php echo $row->id_jadwal; ?>');" title='Hapus Data Jadwal'></a>
											</td>
										</tr>
							<?php
									}
								} else {
									?>
									<tr>
										<td colspan="6" style="text-align: center;">Data Tidak Tersedia</td>
									</tr>
							<?php
								}
							}
							?>
						</tbody>
					</table>
				</p>
			</div>

		<!-- Modal Popup untuk Add--> 
		<div id="ModalAdd" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
			<div class="modal-dialog">
    			<div class="modal-content">

        			<div class="modal-header">
            			<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            			<h4 class="modal-title" id="myModalLabel">Tambah Data Jadwal</h4>
        			</div>

        			<div class="modal-body">
          				<form action="proses_simpan_jadwal.php" name="modal_popup" enctype="multipart/form-data" method="POST">
            
                			
							<div class="form-group" style="padding-bottom: 20px;">
                  				<label for="kegiatan">Kegiatan</label>
                  				<input type="text" name="kegiatan"  class="form-control" required />
                			</div>
							
							<div class="form-group" style="padding-bottom: 20px;">
                  				<label for="tanggal">Tanggal</label>
                  				<input type="text" name="tanggal"  class="form-control datepicker" required />
                			</div>

							<div class="form-group" style="padding-bottom: 20px;">
								<label for="kategori">Kategori</label>
								<select name="kategori" class="form-control" required />
									<option value="" selected disabled>--Pilih Kategori Kegiatan--</option>
									<option value="Pendaftaran">Pendaftaran</option>
									<option value="Sidang">Sidang</option>
									<option value="Informasi">Informasi</option>
								</select>
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

		<!-- Modal Popup untuk tutup jadwal--> 
		<div class="modal fade" id="ModalTutup">
  			<div class="modal-dialog">
    			<div class="modal-content" style="margin-top:100px;">
      				<div class="modal-header">
        				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        				<h4 class="modal-title" style="text-align:center;">Anda Yakin Ingin Menutup Jadwal Ini?</h4>
      				</div>         
	      			<div class="modal-footer" style="margin:0px; border-top:0px; text-align:center;">
	        			<a href="#" class="btn btn-primary" id="tutup_link"><span class="glyphicon glyphicon-ok-sign"></span> Ya</a>
	        			<button type="button" class="btn btn-danger" data-dismiss="modal"><span class="glyphicon glyphicon-remove-sign"></span> Tidak</button>
	      			</div>
    			</div>
  			</div>
		</div>

		<script type="text/javascript">
			$(function() {
				$("#dataJadwal").dataTable();
			});
		</script>

		<!-- Javascript untuk popup modal Edit--> 
		<script type="text/javascript">
   			$(document).ready(function () {
   				$(".open_modal_edit").click(function(e) {
      				var m = $(this).attr("id");
       				$.ajax({
             			url: "modal_edit_jadwal.php",
             			type: "GET",
             			data : {id: m,},
             			success: function (ajaxData){
               				$("#ModalEdit").html(ajaxData);
               				$("#ModalEdit").modal('show',{backdrop: 'true'});
             			}
           			});
        		});
      		});
		</script>

		<!-- Javascript untuk popup modal Delete dan Tutup--> 
		<script type="text/javascript">
    		function confirm_delete(delete_url){
      			$('#ModalDelete').modal('show', {backdrop: 'static'});
      			document.getElementById('delete_link').setAttribute('href' , delete_url);
    		}

			function confirm_tutup(tutup_url) {
				$('#ModalTutup').modal('show', {backdrop: 'static'});
				document.getElementById('tutup_link').setAttribute('href', tutup_url);
			}
		</script>

<?php

$connect->close(); 
$result->close(); 
require '_footer.php';

?>