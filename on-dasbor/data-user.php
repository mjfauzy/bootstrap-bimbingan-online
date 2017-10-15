<?php

require '_header.php';

?>
			<div class="col-md-12">
				<h2>Data Users</h2>
				<hr>
				<p>
					<a href='#' class='btn btn-primary' data-target='#ModalAddUserDosen' data-toggle='modal' title='Tambah Data User Dosen'><span class="glyphicon glyphicon-plus"></span> Dosen</a> 
					<a href='#' class='btn btn-primary' data-target='#ModalAddUserMahasiswa' data-toggle='modal' title='Tambah Data User Mahasiswa'><span class="glyphicon glyphicon-plus"></span> Mahasiswa</a>
				</p>
				<p>
					<table id="dataUser" class="table table-bordered table-hover table-striped">
						<thead>
							<tr>
								<th>No.</th>
								<th>Nama</th>
								<th>Username</th>
								<th>Email</th>
								<th>Hak akses</th>
								<th>Aksi</th>
							</tr>
						</thead>
						<tbody>
							<?php
							$result = mysqli_query($connect,"SELECT * FROM tb_user ORDER BY id_user");
							if ($result) {
								if ($result->num_rows > 0) {
									$no=0;
									while ($row = $result->fetch_object()) {
										$no++;
										?>
										<tr>
											<td><?php echo $no."."; ?></td>
											<td><?php echo $row->nama; ?></td>
											<td><?php echo $row->username; ?></td>
											<td><?php echo $row->email; ?></td> 
											<td><?php echo $row->hak_akses; ?></td> 
											<td class="text-center">
											<?php if($row->hak_akses != "Admin"){ ?>
												<a href='#' class='btn btn-danger glyphicon glyphicon-trash' data-target='#ModalDelete' data-toggle='modal' onclick="confirm_delete('proses_hapus_user.php?id=<?php echo $row->id_user; ?>');" title='Hapus Data User'></a>
											<?php } else { ?>
												<a href='#' class='open_modal_edit btn btn-success glyphicon glyphicon-pencil' data-target='#ModalEdit' data-toggle='modal' id="<?php echo $row->id_user; ?>" title='Edit Data Admin'></a>
											<?php } ?>												
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
		<div id="ModalAddUserDosen" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
			<div class="modal-dialog">
    			<div class="modal-content">

        			<div class="modal-header">
            			<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            			<h4 class="modal-title" id="myModalLabel">Tambah Data User Dosen</h4>
        			</div>

        			<div class="modal-body">
					  	<label for="Data Dosen">Data Dosen</label>
						<table id="dataDosen" class="table table-bordered">
							<thead>
								<tr>
									<th>No.</th>
									<th>NIDN</th>
									<th>Nama</th>
									<th>Alamat</th>
									<th>Aksi</th>
								</tr>
							</thead>
							<tbody>
								<?php
									$q_dosen = mysqli_query($connect,"SELECT * FROM tb_dosen ORDER BY nama");
									if($q_dosen) {
										if($q_dosen->num_rows > 0) {
											while($r_dosen = $q_dosen->fetch_object()):
											STATIC $no = 0;
								?>
								<tr>
									<td><?php echo ++$no; ?></td>
									<td><?php echo $r_dosen->nidn; ?></td>
									<td><?php echo $r_dosen->nama; ?></td>
									<td><?php echo $r_dosen->alamat; ?></td>
									<?php
										$q_user = mysqli_query($connect,"SELECT * FROM tb_user WHERE username='$r_dosen->nidn'");
										if($q_user) {
											if($q_user->num_rows > 0) {
									?>
									<td class="text-center"><a href="proses_simpan_user.php?user=dosen&nidn=<?php echo $r_dosen->nidn; ?>" class="btn btn-success" title="Set to Default"><span class="glyphicon glyphicon-refresh"></span></a></td>									
									<?php
											} else {
									?>
									<td class="text-center"><a href="proses_simpan_user.php?user=dosen&nidn=<?php echo $r_dosen->nidn; ?>" class="btn btn-primary" title="Add User"><span class="glyphicon glyphicon-user"></span></a></td>
									<?php										
											}
										}
									?>
								</tr>
								<?php
											endwhile;
										}
									}
								?>
						</table>
            		</div>
        		</div>
    		</div>
		</div>

		<div id="ModalAddUserMahasiswa" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
			<div class="modal-dialog">
    			<div class="modal-content">

        			<div class="modal-header">
            			<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            			<h4 class="modal-title" id="myModalLabel">Tambah Data User Mahasiswa</h4>
        			</div>

        			<div class="modal-body">
          				<form action="proses_simpan_user.php?user=mahasiswa" name="modal_popup" enctype="multipart/form-data" method="POST">
						  	<label for="Data Mahasiswa">Data Mahasiswa</label>
							<table id="dataMahasiswa" class="table table-bordered">
								<thead>
									<tr>
										<th>No.</th>
										<th>NIM</th>
										<th>Nama</th>
										<th>Alamat</th>
										<th>Aksi</th>
									</tr>
								</thead>
								<tbody>
									<?php
										$q_mahasiswa = mysqli_query($connect,"SELECT * FROM tb_mahasiswa ORDER BY nama");
										if($q_mahasiswa) {
											if($q_mahasiswa->num_rows > 0) {
												while($r_mahasiswa = $q_mahasiswa->fetch_object()):
												STATIC $no = 0;
									?>
									<tr>
										<td><?php echo ++$no; ?></td>
										<td><?php echo $r_mahasiswa->nim; ?></td>
										<td><?php echo $r_mahasiswa->nama; ?></td>
										<td><?php echo $r_mahasiswa->alamat; ?></td>
										<?php
											$q_user = mysqli_query($connect,"SELECT * FROM tb_user WHERE username='$r_mahasiswa->nim'");
											if($q_user) {
												if($q_user->num_rows > 0) {

										?>
										<td class="text-center"><a href="proses_simpan_user.php?user=mahasiswa&nim=<?php echo $r_mahasiswa->nim; ?>" class="btn btn-success" title="Set to Default"><span class="glyphicon glyphicon-refresh"></span></a></td>										
										<?php
												} else {
										?>
										<td class="text-center"><a href="proses_simpan_user.php?user=mahasiswa&nim=<?php echo $r_mahasiswa->nim; ?>" class="btn btn-primary" title="Add User"><span class="glyphicon glyphicon-user"></span></a></td>
										<?php										
												}
											}
										?>
									</tr>
									<?php
												endwhile;
											}
										}
									?>
							</table>
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

		<script type="text/javascript">
			$(function() {
				$("#dataUser").dataTable();
			});
		</script>

		<!-- Javascript untuk popup modal Edit--> 
		<script type="text/javascript">
   			$(document).ready(function () {
   				$(".open_modal_edit").click(function(e) {
      				var m = $(this).attr("id");
       				$.ajax({
             			url: "modal_edit_user.php",
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

		<!-- Javascript untuk popup modal Delete--> 
		<script type="text/javascript">
    		function confirm_delete(delete_url){
      			$('#ModalDelete').modal('show', {backdrop: 'static'});
      			document.getElementById('delete_link').setAttribute('href' , delete_url);
    		}
		</script>

<?php

$connect->close(); 
$result->close(); 
require '_footer.php';

?>