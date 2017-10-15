<?php

require '_header.php';
include 'koneksi.php';


?>
			<div class="col-md-12">
				<h2>Jadwal Seputar Kegiatan Skripsi</h2>
				<hr>
				
				<p>
					<table id="dataJadwal" class="table table-bordered table-hover table-striped">
						<thead>
							<tr>
							
								<th>Tanggal Pendaftaran Skripsi</th>
								<th>Tanggal Pendaftaran Sidang</th>
								<th>Tanggal Pelaksanaan Sidang</th>
								<th>Tanggal Pendaftaran Wisuda</th>
								<th>Tanggal Pelaksanaan Wisuda</th>
							</tr>
						</thead>
						<tbody>
										<tr>
											<td><?php echo $no."."; ?></td>
											<td><?php echo $row->tgl_daftar_skripsi; ?></td>
											<td><?php echo $row->tgl_daftra_sidang; ?></td>
											<td><?php echo $row->tgl_sidang; ?></td> 
											<td><?php echo $row->tgl_daftra_wisuda; ?></td> 
											<td><?php echo $row->tgl_wisuda; ?></td> 
											<td class="text-center">
												<a href='#' class='open_modal_edit btn btn-success glyphicon glyphicon-pencil' data-target='#ModalEdit' data-toggle='modal' id="<?php echo $row->id; ?>" title='Edit Data User'></a>  
												<a href='#' class='btn btn-danger glyphicon glyphicon-trash' data-target='#ModalDelete' data-toggle='modal' onclick="confirm_delete('proses_hapus_user.php?&id=<?php echo $row->id; ?>');" title='Hapus Data User'></a>
											</td>
										</tr>
							<?php
									}
								} else {
									?>
									<tr>
										<td colspan="5" style="text-align: center;">Data Tidak Tersedia</td>
									</tr>
							<?php
								}
							}
							?>
						</tbody>
					</table>
				</p>
			</div>
