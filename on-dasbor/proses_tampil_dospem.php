<?php

require '_header.php'; 
include "../koneksi.php";

?>
			<div class="col-md-12">
				<h2>Informasi Nama Dosen Pembimbing</h2>
				<hr>
				
				<p>
					<table id="dataDospem" class="table table-bordered table-hover table-striped">
						<thead>
							<tr>
							 
								<th>NIM</th>
								<th>Nama</th>
								<th>NIP</th>
								<th>Dosen Pembimbing</th>
							
							</tr>
						</thead>
						<tbody>
										<tr>
											<td><?php echo $row->nim; ?></td>
											<td><?php echo $row->nama; ?></td>
											<td><?php echo $row->nip; ?></td> 
											<td><?php echo $row->nama_dosen; ?></td> 
											
										</tr>
							
						</tbody>
					</table>
				</p>
			</div>
