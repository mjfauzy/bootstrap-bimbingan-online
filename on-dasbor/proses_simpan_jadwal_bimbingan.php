<?php

include "../koneksi.php";


$tgl_bimbingan= $_POST['tgl_bimbingan'];
$jam_bimbingan = $_POST['jam_bimbingan'];
$konsultasi = $_POST['konsultasi'];
if($simpan = mysqli_query($connect,"INSERT INTO jadwal_bimbingan (tgl_bimbingan, jam_bimbingan, konsultasi) VALUES ('$tgl_bimbingan','$jam_bimbingan,'$konsultasi')")) {
	echo "<script>alert('Berhasil Simpan Data Jadwal Bimbingan');</script>";
	echo "<meta http-equiv='refresh' content='0; url=jadwal_bimbingan.php'>";
} else {
	echo "<script>alert('Gagal Simpan Data Jadwal Bimbingan');</script>";
	echo "<meta http-equiv='refresh' content='0; url=jadwal_bimbingan.php'>";
}

$connect->close();
exit();

?>