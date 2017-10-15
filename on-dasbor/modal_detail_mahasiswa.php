<?php
  include "../koneksi.php";

	$nim = $_GET['id'];
	$result = mysqli_query($connect, "SELECT tb_mahasiswa.*, tb_daftar.* FROM tb_mahasiswa, tb_daftar WHERE tb_mahasiswa.nim='$nim' AND tb_daftar.nim='$nim'");

	if ($result) {
		if ($result->num_rows > 0) {
			while ($row = $result->fetch_object()) {
?>

<div class="modal-dialog">
    <div class="modal-content">

        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h4 class="modal-title" id="myModalLabel">Detail Data Mahasiswa</h4>
        </div>

        <div class="modal-body">

                <div class="form-group" style="padding-bottom: 20px;">
                  <label for="nim">NIM</label>
                  <input type="text" name="nidn_tampilan"  class="form-control" value="<?php echo $row->nim; ?>" disabled/>
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
                  <label for="No. Telp/HP">No. Telp/HP</label>
                  <input type="text" name="no_telp_hp"  class="form-control" value="<?php echo $row->no_telp.' / '.$row->no_hp; ?>" disabled />
                </div>

                <div class="form-group" style="padding-bottom: 20px;">
                  <label for="email">Email</label>
                  <input type="text" name="email"  class="form-control" value="<?php echo $row->email; ?>" disabled />
                </div>

                <div class="form-group" style="padding-bottom: 20px;">
                  <label for="SKS">SKS</label>
                  <input type="text" name="sks" class="form-control" value="<?php echo $row->sks; ?>" disabled />
                </div>

                <div class="form-group" style="padding-bottom: 20px;">
                  <label for="IPK">IPK</label>
                  <input type="text" name="ipk" class="form-control" value="<?php echo $row->ipk; ?>" disabled />
                </div>
				
                <div class="modal-footer">
                  <button type="reset" class="btn btn-danger"  data-dismiss="modal" aria-hidden="true">
                    <span class="glyphicon glyphicon-ban-circle"></span> Tutup
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