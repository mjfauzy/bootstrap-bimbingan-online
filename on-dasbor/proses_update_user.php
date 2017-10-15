<?php

include "../koneksi.php";

$id_user = $_POST['id_user'];
$nama = $_POST['nama'];
$username = $_POST['username'];
$password = md5($_POST['password']);
$email = $_POST['email'];
$hak_akses = $_POST['hak_akses'];

if($simpan = mysqli_query($connect,"UPDATE tb_user SET nama='$nama',username='$username',password='$password',email='$email',hak_akses='$hak_akses' WHERE id_user='$id_user'")) {
	echo "<script>alert('Berhasil Update Data User');</script>";
	echo "<meta http-equiv='refresh' content='0; url=data-user.php'>";
} else {
	echo "<script>alert('Gagal Update Data User');</script>";
	echo "<meta http-equiv='refresh' content='0; url=data-user.php'>";
}

$connect->close();
exit();

?>