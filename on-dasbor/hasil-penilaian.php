<?php

require '_header.php';

?>
				<h2>Data Mahasiswa</h2>
				<hr></hr>
				<p>
				
        		<div class="modal-body">
          				<form action="proses_simpan_nilai.php" name="modal_popup" enctype="multipart/form-data" method="POST">
					<table id="dataMahasiwa" class="table table-bordered table-hover table-striped">
						<thead>
							<tr>
								<th>NIM</th>
								<th>Nama</th>
								<th>Judul Skripsi</th>
								<th>Nilai</th>
								<th>Grade</th>
								<th>Aksi</th>
							</tr>
						</thead>
						<tbody>
							<?php
							$result = mysqli_query($connect,"SELECT * FROM mahasiswa ORDER BY nama");
							if ($result) {
								if ($result->num_rows > 0) {
									$no=0;
									while ($row = $result->fetch_object()) {
										$no++;
										?>
										<tr>
											<td><?php echo $row->nim; ?></td>
											<td><?php echo $row->nama; ?></td>
											<td><?php echo $row->judul_skripsi; ?></td>
                  				</select></td>
								<td class="form-group" style="padding-bottom: 20px;">
                  				<select name="hak_akses" class="form-control" required>
                  					<option value="" selected disabled>- Grade -</option>
                  					<option value="A">A</option>
                  					<option value="B">B</option>
                  					<option value="C">C</option>
                  					<option value="D">D</option>
                  					<option value="E">E</option>
                  				</select></td>

											<td class="text-center">
												<a href='#' class='open_modal_edit btn btn-success glyphicon glyphicon-pencil' data-target='#ModalEdit' data-toggle='modal' id="<?php echo $row->id; ?>" title='Edit Data Mahasiswa'></a>
												<a href='#' class='btn btn-danger glyphicon glyphicon-trash' data-target='#ModalDelete' data-toggle='modal' onclick="confirm_delete('proses_hapus_mahasiswa.php?&id=<?php echo $row->id; ?>');" title='Hapus Data Guru'></a>
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
					<!-- Button -->
							  <label class="col-md-4 control-label" for="Simpan"></label>
							  <div class="col-md-4"><div class="modal-footer">
                				<button class="btn btn-success" type="submit"><span class="glyphicon glyphicon-floppy-disk"></span> Simpan</button>                
                				<button type="reset" class="btn btn-danger"  data-dismiss="modal" aria-hidden="true"><span class="glyphicon glyphicon-ban-circle"></span> Tutup</button>
		
			</div>
			</div>
			</div>

<?php

require '_footer.php';

?>