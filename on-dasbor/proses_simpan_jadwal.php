<?php

include "../koneksi.php";

$kegiatan= $_POST['kegiatan'];
$tanggal = $_POST['tanggal'];
$kategori = $_POST['kategori'];
$perihal = $_POST['perihal'];
$status = '-';

if($kategori == 'Pendaftaran') {
	$status = 'Dibuka';
}

if($simpan = mysqli_query($connect,"INSERT INTO tb_jadwal VALUES ('','$kegiatan','$tanggal','$kategori','$perihal','$status')")) {
	echo "<script>alert('Berhasil Simpan Data Jadwal');</script>";
	echo "<meta http-equiv='refresh' content='0; url=data-jadwal.php'>";
} else {
	echo "<script>alert('Gagal Simpan Data Jadwal');</script>";
	echo "<meta http-equiv='refresh' content='0; url=data-jadwal.php'>";
}

$connect->close();
exit();

?>