<?php

include "../koneksi.php";

$id_jadwal = $_GET['id'];
$status = "Ditutup";

if($hapus = mysqli_query($connect,"UPDATE tb_jadwal SET status='$status' WHERE id_jadwal='$id_jadwal'")) {
	echo "<script>alert('Berhasil Tutup Jadwal');</script>";
	echo "<meta http-equiv='refresh' content='0; url=data-jadwal.php'>";
} else {
	echo "<script>alert('Gagal Tutup Jadwal');</script>";
	echo "<meta http-equiv='refresh' content='0; url=data-jadwal.php'>";
}

$connect->close();
exit();

?>