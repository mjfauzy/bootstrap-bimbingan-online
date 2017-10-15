<?php

include "../koneksi.php";

$id_user = $_GET['id'];

if($hapus = mysqli_query($connect,"DELETE FROM tb_user where id_user='$id_user'")) {
	echo "<script>alert('Berhasil Hapus Data User');</script>";
	echo "<meta http-equiv='refresh' content='0; url=data-user.php'>";
} else {
	echo "<script>alert('Gagal Hapus Data User');</script>";
	echo "<meta http-equiv='refresh' content='0; url=data-user.php'>";
}

$connect->close();
exit();

?>