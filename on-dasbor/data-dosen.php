<?php

require '_header.php';

?>
			<div class="col-md-12">
				<h2>Data Dosen</h2>
				<hr>
				<p>
					<a href='#' class='btn btn-primary glyphicon glyphicon-plus' data-target='#ModalAdd' data-toggle='modal' title='Tambah Data Dosen'></a>
				</p>
				<p>
					<table id="dataDosen" class="table table-hover table-striped table-bordered">
						<thead>
							<tr>
								<th>No.</th>
								<th>NIDN</th>
								<th>Nama</th>
								<th>Alamat</th>
								<th>Jenis Kelamin</th>
								<th>No. Telp</th>
								<th>Email</th>
								<th>Aksi</th>
							</tr>
						</thead>
						<tbody>
							<?php
							$result = mysqli_query($connect,"SELECT * FROM tb_dosen ORDER BY nama");
							if ($result) {
								if ($result->num_rows > 0) {
									$no=0;
									while ($row = $result->fetch_object()) {
										$no++;
										?>
										<tr>
											<td><?php echo $no."."; ?></td>
											<td><?php echo $row->nidn; ?></td>
											<td><?php echo $row->nama; ?></td>
											<td><?php echo $row->alamat; ?></td>
											<td><?php echo $row->jenis_kelamin; ?></td>
											<td><?php echo $row->no_telp; ?></td>
											<td><?php echo $row->email; ?></td> 
											<td class="text-center">
												<a href='#' class='open_modal_edit btn btn-success glyphicon glyphicon-pencil' data-target='#ModalEdit' data-toggle='modal' id="<?php echo $row->nidn; ?>" title='Edit Data Dosen'></a>
												<a href='#' class='btn btn-danger glyphicon glyphicon-trash' data-target='#ModalDelete' data-toggle='modal' onclick="confirm_delete('proses_hapus_dosen.php?&id=<?php echo $row->nidn; ?>');" title='Hapus Data Dosen'></a>
											</td>
										</tr>
							<?php
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

		<!-- Modal Popup untuk Add--> 
		<div id="ModalAdd" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
			<div class="modal-dialog">
    			<div class="modal-content">

        			<div class="modal-header">
            			<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            			<h4 class="modal-title" id="myModalLabel">Tambah Data Dosen</h4>
        			</div>

        			<div class="modal-body">
          				<form action="proses_simpan_dosen.php" name="modal_popup" enctype="multipart/form-data" method="POST">
            
                			<div class="form-group" style="padding-bottom: 20px;">
                  				<label for="NIP">NIDN</label>
                  				<input type="text" name="nidn"  class="form-control" required />
                			</div>

                			<div class="form-group" style="padding-bottom: 20px;">
                  				<label for="Nama">Nama</label>
                  				<input type="text" name="nama"  class="form-control" required />
                			</div>

                			<div class="form-group" style="padding-bottom: 20px;">
                  				<label for="Alamat">Alamat</label>
                  				<textarea type="text" name="alamat"  class="form-control" required></textarea>
                			</div>

                			<div class="form-group" style="padding-bottom: 20px;">
                  				<label for="Jenis Kelamin">Jenis Kelamin</label>
                  				<select name="jenis_kelamin" class="form-control" required>
                    				<option value="" disabled selected>- Pilih Jenis Kelamin -</option>
                    				<option value="Pria">Pria</option>
                    				<option value="Wanita">Wanita</option>
                  				</select>
                			</div>

                			<div class="form-group" style="padding-bottom: 20px;">
                  				<label for="No. Telp">No. Telp</label>
                  				<input type="text" name="no_telp"  class="form-control" required />
                			</div>

                			<div class="form-group" style="padding-bottom: 20px;">
                  				<label for="email">Email</label>
                  				<input type="text" name="email"  class="form-control" required />
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

		<script type="text/javascript">
			$(function() {
				$("#dataDosen").dataTable();
			});
		</script>

		<!-- Javascript untuk popup modal Edit--> 
		<script type="text/javascript">
   			$(document).ready(function () {
   				$(".open_modal_edit").click(function(e) {
      				var m = $(this).attr("id");
       				$.ajax({
             			url: "modal_edit_dosen.php",
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

require '_footer.php';

?>