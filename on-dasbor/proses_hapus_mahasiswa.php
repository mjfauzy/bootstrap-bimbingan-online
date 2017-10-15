<?php

include "../koneksi.php";

$nim = $_GET['nim'];

if($hapus = mysqli_query($connect,"DELETE FROM tb_mahasiswa where nim='$nim'")) {
	echo "<script>alert('Berhasil Hapus Data Mahasiswa');</script>";
	echo "<meta http-equiv='refresh' content='0; url=data-mahasiswa.php'>";
} else {
	echo "<script>alert('Gagal Hapus Data Mahasiswa');</script>";
	echo "<meta http-equiv='refresh' content='0; url=data-mahasiswa.php'>";
}

$connect->close();
exit();

?>