<?php

include "../koneksi.php";

$id_jadwal = $_GET['id'];

if($hapus = mysqli_query($connect,"DELETE FROM tb_jadwal where id_jadwal='$id_jadwal'")) {
	echo "<script>alert('Berhasil Hapus Data Jadwal');</script>";
	echo "<meta http-equiv='refresh' content='0; url=data-jadwal.php'>";
} else {
	echo "<script>alert('Gagal Hapus Data Jadwal');</script>";
	echo "<meta http-equiv='refresh' content='0; url=data-jadwal.php'>";
}

$connect->close();
exit();

?>