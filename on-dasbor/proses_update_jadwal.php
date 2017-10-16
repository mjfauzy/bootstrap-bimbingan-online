<?php

include "../koneksi.php";

$id_jadwal = $_POST['id_jadwal'];
$kegiatan = $_POST['kegiatan'];
$tanggal = $_POST['tanggal'];
$kategori = $_POST['kategori'];
$perihal = $_POST['perihal'];
$status = '-';

if($kategori == 'Pendaftaran') {
	$status = 'Dibuka';
}

if($simpan = mysqli_query($connect,"UPDATE tb_jadwal SET kegiatan='$kegiatan',tanggal='$tanggal',perihal='$perihal',status='$status' WHERE id_jadwal='$id_jadwal'")) {
	echo "<script>alert('Berhasil Update Data Jadwal');</script>";
	echo "<meta http-equiv='refresh' content='0; url=data-jadwal.php'>";
} else {
	echo "<script>alert('Gagal Update Data Jadwal');</script>";
	echo "<meta http-equiv='refresh' content='0; url=data-jadwal.php'>";
}

$connect->close();
exit();

?>