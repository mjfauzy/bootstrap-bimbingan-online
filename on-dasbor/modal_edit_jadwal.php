<?php
  include "../koneksi.php";

	$id_jadwal = $_GET['id'];
	$result = mysqli_query($connect, "SELECT * FROM tb_jadwal WHERE id_jadwal='$id_jadwal'");

	if ($result) {
		if ($result->num_rows > 0) {
			while ($row = $result->fetch_object()) {
?>

<div class="modal-dialog">
    <div class="modal-content">

        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="modal-title" id="myModalLabel">Edit Data Jadwal</h4>
        </div>

        <div class="modal-body">
          <form action="proses_update_jadwal.php" name="modal_popup" enctype="multipart/form-data" method="POST">
          		  <input type="hidden" name="id_jadwal" value="<?php echo $row->id_jadwal; ?>" />
				
                <div class="form-group" style="padding-bottom: 20px;">
                  <label for="Kegiatan">Kegiatan</label>
                  <input type="text" name="kegiatan"  class="form-control" value="<?php echo $row->kegiatan; ?>" required/>
                </div>

                <div class="form-group" style="padding-bottom: 20px;">
                  <label for="Tanggal">Tanggal</label>
                  <input type="text" name="tanggal"  class="form-control datepicker" value="<?php echo $row->tanggal; ?>" required/>
                </div>

                <div class="form-group" style="padding-bottom: 20px;">
                  <label for="Kategori">Kategori</label>
                  <select name="kategori" class="form-control" required>
                    <option value="" disabled>--Pilih Kategori Kegiatan--</option>
                    <option value="Pendaftaran" <?php if($row->kategori == 'Pendaftaran') echo "selected"; ?>>Pendaftaran</option>
                    <option value="Sidang" <?php if($row->kategori == 'Sidang') echo "selected"; ?>>Sidang</option>
                    <option value="Informasi" <?php if($row->kategori == 'Informasi') echo "selected"; ?>>Informasi</option>
                  </select>
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