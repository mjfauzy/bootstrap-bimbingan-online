<?php

require '_header.php';
include "../koneksi.php";

?>
			<div class="col-md-12">
				<h2>Jadwal Bimbingan skripsi</h2>
				<hr>
				
				<p>
					<table id="Jadwal" class="table table-bordered table-hover table-striped">
						<thead>
							<tr>
								<th>Tanggal Bimbingan</th>
								<th>jam</th>
								<th>konsultasi</th>
							</tr>
						</thead>
						<tbody>
										<tr>
										<td><?php echo $row->tgl_bimbingan; ?></td>
										<td><?php echo $row->jam_bimbingan; ?></td>
										<td><?php echo $row->konsultasi; ?></td> 
										</tr>
							
							
						</tbody>
					</table>
				</p>
			</div>
