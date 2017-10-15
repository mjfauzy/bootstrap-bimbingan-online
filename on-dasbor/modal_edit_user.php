<?php
  include "../koneksi.php";

	$id_user = $_GET['id'];
	$result = mysqli_query($connect, "SELECT * FROM tb_user WHERE id_user='$id_user'");

	if ($result) {
		if ($result->num_rows > 0) {
			while ($row = $result->fetch_object()) {
?>

<div class="modal-dialog">
    <div class="modal-content">

        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="modal-title" id="myModalLabel">Edit Data User</h4>
        </div>

        <div class="modal-body">
          <form action="proses_update_user.php" name="modal_popup" enctype="multipart/form-data" method="POST">
          		  <input type="hidden" name="id_user" value="<?php echo $row->id_user; ?>" />
				
                <div class="form-group" style="padding-bottom: 20px;">
                  <label for="Nama">Nama</label>
                  <input type="text" name="nama"  class="form-control" value="<?php echo $row->nama; ?>" required/>
                </div>

                <div class="form-group" style="padding-bottom: 20px;">
                  <label for="Username">Username</label>
                  <input type="text" name="username"  class="form-control" value="<?php echo $row->username; ?>" required/>
                </div>

                <div class="form-group" style="padding-bottom: 20px;">
                  <label for="Email">Email</label>
                  <input type="email" name="email"  class="form-control" value="<?php echo $row->email; ?>" required/>
                </div>

                <div class="form-group" style="padding-bottom: 20px;">
                  <label for="Password">Password</label>
                  <input type="password" name="password"  class="form-control"  required/>
                </div>

                <div class="form-group" style="padding-bottom: 20px;">
                  <label for="Hak Akses">Hak Akses</label>
                  <input type="text" name="hak_akses" value="<?php echo $row->hak_akses; ?>" class="form-control" disabled />
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