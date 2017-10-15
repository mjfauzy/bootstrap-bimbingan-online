<?php

require '_header.php';

?>
			<div class="col-md-12">
				<h2>Kartu Bimbingan Skripsi</h2>
				<hr>
				<p>
					<b>DOWNLOAD Kartu Bimbingan skripsi disini !</b>
					<a href='print_laporan.php' target="_self" class='btn btn-success glyphicon glyphicon-save' title='print Laporan'>
					</a>
				</p>
				<hr />
				</div>

		<!-- Modal Popup untuk Add--> 
		<div id="ModalView" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
			<div class="modal-dialog">
    			<div class="modal-content">

        			<div class="modal-header">
            			<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            			<h4 class="modal-title" id="myModalLabel">Guru Terbaik yang Terpilih</h4>
        			</div>

        			<div class="modal-body">
            
                		<table class="table table-default text-center">
							<thead>
								<tr>
										<th>Nama</th>
									<th>Nilai Preferensi</th>
						        </tr>
					      	</thead>
					      	<tbody>
					        	<tr>
						        	<td><?php echo $nama_terpilih." ".$A_terpilih; ?></td>
						        	<td><?php echo $terpilih; ?></td>
						        </tr>
					      	</tbody>
						</table>
            		</div>
        		</div>
    		</div>
		</div>

<?php
require '_footer.php';

?>