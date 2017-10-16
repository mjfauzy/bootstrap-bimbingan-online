<?php

require '_header.php';

?>
			<div class="col-md-12">
				<h2>Data Mahasiswa Bimbingan</h2>
				<p>
					<table id="dataMahasiswa" class="table table-bordered table-hover table-striped">
						<thead>
							<tr>
								<th>No.</th>
								<th>NIM</th>
								<th>Nama</th>
								<th>Judul</th>
								<th>Aksi</th>
							</tr>
						</thead>
						<tbody>
							<?php
							$result = mysqli_query($connect,"SELECT * FROM tb_daftar WHERE nidn='".$_SESSION['username']."' ORDER BY kd_daftar");
							if ($result) {
								if ($result->num_rows > 0) {
									$no=0;
									while ($row = $result->fetch_object()) {
										$no++;
										$nim = $row->nim;
										$q_mahasiswa = mysqli_query($connect,"SELECT tb_mahasiswa.nama, tb_daftar.judul, tb_daftar.status FROM tb_mahasiswa, tb_daftar WHERE tb_mahasiswa.nim='$nim' AND tb_daftar.nim='$nim'");
										if($q_mahasiswa):
											if($q_mahasiswa->num_rows > 0):
												$r_mahasiswa = $q_mahasiswa->fetch_object();
							?>
										<tr>
											<td class="text-center"><?php echo $no."."; ?></td>
											<td class="text-center"><?php echo $row->nim; ?></td>
											<td><a href='#' class="open_modal_detail_mhs" data-target='#ModalDetailMhs' data-toggle='modal' id='<?php echo $row->nim; ?>' title="Detail Data Mahasiswa"><?php echo $r_mahasiswa->nama; ?></a></td>
											<td><?php echo $r_mahasiswa->judul; ?></td>
											<td class="text-center">
												<?php
													if($r_mahasiswa->status == 'ACC') {
														echo "<strong class='text-success'>Judul Telah Di-ACC</strong>";
													} elseif($r_mahasiswa->status == 'Revisi') {
														echo "<strong class='text-danger'>Judul Telah Di-Tolak</strong>";
													} else {
												?>
												<a href='#' class='btn btn-success' data-target='#ModalAcc' data-toggle='modal' onclick="confirm_acc('proses_acc_judul.php?nim=<?php echo $row->nim; ?>');" title='ACC Judul'><span class="glyphicon glyphicon-ok"></span> ACC</a>
												<a href='#' class='btn btn-danger' data-target='#ModalRevisi' data-toggle='modal' onclick="confirm_revisi('proses_revisi_judul.php?nim=<?php echo $row->nim; ?>');" title='Revisi Judul'><span class="glyphicon glyphicon-remove"></span> Tolak</a>
												<?php } ?>
											</td>
										</tr>
							<?php
											endif;
										endif;
									}
								}
							}
							$connect->close(); 
							$result->close(); 
							?>
						</tbody>
					</table>
				</p>
			</div>

		<!-- Modal Popup untuk Detail Mahasiswa--> 
		<div id="ModalDetailMhs" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">

		</div>

		<!-- Modal Popup untuk ACC judul--> 
		<div class="modal fade" id="ModalAcc">
  			<div class="modal-dialog">
    			<div class="modal-content" style="margin-top:100px;">
      				<div class="modal-header">
        				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        				<h4 class="modal-title" style="text-align:center;">Anda Yakin Ingin ACC Judul Ini?</h4>
      				</div>         
	      			<div class="modal-footer" style="margin:0px; border-top:0px; text-align:center;">
	        			<a href="#" class="btn btn-primary" id="acc_link"><span class="glyphicon glyphicon-ok-sign"></span> Ya</a>
	        			<button type="button" class="btn btn-danger" data-dismiss="modal"><span class="glyphicon glyphicon-remove-sign"></span> Tidak</button>
	      			</div>
    			</div>
  			</div>
		</div>

		<!-- Modal Popup untuk Revisi judul--> 
		<div class="modal fade" id="ModalRevisi">
  			<div class="modal-dialog">
    			<div class="modal-content" style="margin-top:100px;">
      				<div class="modal-header">
        				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        				<h4 class="modal-title" style="text-align:center;">Anda Yakin Ingin Menolak Judul Ini?</h4>
      				</div>         
	      			<div class="modal-footer" style="margin:0px; border-top:0px; text-align:center;">
	        			<a href="#" class="btn btn-primary" id="revisi_link"><span class="glyphicon glyphicon-ok-sign"></span> Ya</a>
	        			<button type="button" class="btn btn-danger" data-dismiss="modal"><span class="glyphicon glyphicon-remove-sign"></span> Tidak</button>
	      			</div>
    			</div>
  			</div>
		</div>

		<!-- Javascript untuk apa aja--> 
		<script type="text/javascript">
			// untuk data tabel mahasiswa
			$(function() {
				$("#dataMahasiswa").dataTable();
			});

			// untuk menampilkan modal detail mahasiswa
   			$(document).ready(function () {
   				$(".open_modal_detail_mhs").click(function(e) {
      				var m = $(this).attr("id");
       				$.ajax({
             			url: "modal_detail_mahasiswa.php",
             			type: "GET",
             			data : {id: m,},
             			success: function (ajaxData){
               				$("#ModalDetailMhs").html(ajaxData);
               				$("#ModalDetailMhs").modal('show',{backdrop: 'true'});
             			}
           			});
        		});
      		});

   			// untuk menampilkan konfirmasi acc judul
      		function confirm_acc(acc_url){
      			$('#ModalAcc').modal('show', {backdrop: 'static'});
      			document.getElementById('acc_link').setAttribute('href' , acc_url);
    		}

    		// untuk menampilkan konfirmasi revisi judul
      		function confirm_revisi(revisi_url){
      			$('#ModalRevisi').modal('show', {backdrop: 'static'});
      			document.getElementById('revisi_link').setAttribute('href' , revisi_url);
    		}
		</script>

<?php

require '_footer.php';

?>
