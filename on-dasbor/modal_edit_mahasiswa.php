<?php
  include "../koneksi.php";

	$nim = $_GET['nim'];
	$result = mysqli_query($connect, "SELECT * FROM tb_mahasiswa WHERE nim='$nim'");

	if ($result) {
		if ($result->num_rows > 0) {
			while ($row = $result->fetch_object()) {
?>

<div class="modal-dialog">
    <div class="modal-content">

        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h4 class="modal-title" id="myModalLabel">Edit Data Mahasiswa</h4>
        </div>

        <div class="modal-body">
          <form action="proses_update_mahasiswa.php" name="modal_popup" enctype="multipart/form-data" method="POST">
          		  <input type="hidden" name="nim" value="<?php echo $nim; ?>" />
							
								<div class="form-group" style="padding-bottom: 20px;">
									<label for="nim">NIM</label>
									<input type="text" name="nim_tampil"  class="form-control" value="<?php echo $row->nim; ?>" disabled />
								</div>

                <div class="form-group" style="padding-bottom: 20px;">
                	<label for="nama">Nama</label>
                	<input type="text" name="nama"  class="form-control" value="<?php echo $row->nama ?>" required />
                </div>

                <div class="form-group" style="padding-bottom: 20px;">
                	<label for="Alamat">Alamat</label>
                	<input type="text" name="alamat"  class="form-control" value="<?php echo $row->alamat ?>" required />
                </div>
							
                <div class="form-group" style="padding-bottom: 20px;">
                	<label for="Jenis Kelamin">Jenis Kelamin</label>
									<select name="jenis_kelamin" class="form-control">
										<option value="" disabled>--Pilih Jenis Kelamin--</option>
										<option value="Pria" <?php if($row->jenis_kelamin == "Pria") echo "selected"; ?> >Pria</option>
										<option value="Wanita" <?php if($row->jenis_kelamin == "Wanita") echo "selected"; ?> >Wanita</option>
									</select>
                </div>


                <div class="form-group" style="padding-bottom: 20px;">
                	<label for="No. Telp">No. Telp</label>
                	<input type="text" name="no_telp"  class="form-control" value="<?php echo $row->no_telp; ?>" required />
                </div>	

							
                <div class="form-group" style="padding-bottom: 20px;">
                	<label for="Email">Email</label>
                	<input type="text" name="email"  class="form-control" value="<?php echo $row->email; ?>" required/>
                </div>

                <div class="modal-footer">
                  <button class="btn btn-success" type="submit">
                      <span class="glyphicon glyphicon-floppy-open"></span> Update
                  </button>

                  <button type="reset" class="btn btn-danger"  data-dismiss="modal" aria-hidden="true">
                    <span class="glyphicon glyphicon-ban-circle"></span> Batal
                  </button>
                </div>
              </form>

            </div>
        </div>
    </div>
</div>


<?php

			}
		}
	}

	$connect->close();
?>