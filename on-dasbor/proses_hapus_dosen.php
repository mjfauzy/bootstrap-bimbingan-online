<?php

include "../koneksi.php";

$id = $_GET['id'];

if($hapus = mysqli_query($connect,"DELETE FROM tb_dosen where nidn='$id'")) {
	echo "<script>alert('Berhasil Hapus Data Dosen');</script>";
	echo "<meta http-equiv='refresh' content='0; url=data-dosen.php'>";
} else {
	echo "<script>alert('Gagal Hapus Data Dosen');</script>";
	echo "<meta http-equiv='refresh' content='0; url=data-dosen.php'>";
}

$connect->close();
exit();

?>