<?php
  include "../koneksi.php";

	$id = $_GET['id'];
	$result = mysqli_query($connect, "SELECT * FROM tb_dosen WHERE nidn='$id'");

	if ($result) {
		if ($result->num_rows > 0) {
			while ($row = $result->fetch_object()) {
?>

<div class="modal-dialog">
    <div class="modal-content">

        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h4 class="modal-title" id="myModalLabel">Detail Data Dosen</h4>
        </div>

        <div class="modal-body">

                <div class="form-group" style="padding-bottom: 20px;">
                  <label for="nidn">NIDN</label>
                  <input type="text" name="nidn_tampilan"  class="form-control" value="<?php echo $row->nidn; ?>" disabled/>
                </div>

                <div class="form-group" style="padding-bottom: 20px;">
                  <label for="Nama">Nama</label>
                  <input type="text" name="nama"  class="form-control" value="<?php echo $row->nama; ?>" disabled />
                </div>

                <div class="form-group" style="padding-bottom: 20px;">
                  <label for="Alamat">Alamat</label>
                  <textarea type="text" name="alamat"  class="form-control" disabled><?php echo $row->alamat; ?></textarea>
                </div>

                <div class="form-group" style="padding-bottom: 20px;">
                  <label for="Jenis Kelamin">Jenis Kelamin</label>
                  <select name="jenis_kelamin" class="form-control" disabled>
                    <option value="" disabled>- Pilih Jenis Kelamin -</option>
                    <option value="Pria" <?php if($row->jenis_kelamin == 'Pria') echo "selected"; ?> >Pria</option>
                    <option value="Wanita" <?php if($row->jenis_kelamin == 'Wanita') echo "selected"; ?> >Wanita</option>
                  </select>
                </div>

                <div class="form-group" style="padding-bottom: 20px;">
                  <label for="No. Telp">No. Telp</label>
                  <input type="text" name="no_telp"  class="form-control" value="<?php echo $row->no_telp; ?>" disabled />
                </div>

                <div class="form-group" style="padding-bottom: 20px;">
                  <label for="email">Email</label>
                  <input type="text" name="email"  class="form-control" value="<?php echo $row->email; ?>" disabled />
                </div>
				
                <div class="modal-footer">
                  <button type="reset" class="btn btn-danger"  data-dismiss="modal" aria-hidden="true">
                    <span class="glyphicon glyphicon-ban-circle"></span> Tutup
                  </button>
                </div>

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