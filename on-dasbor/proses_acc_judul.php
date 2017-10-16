<?php

include "../koneksi.php";

$nim = $_GET['nim'];

$q_daftar = mysqli_query($connect,"SELECT kd_daftar FROM tb_daftar WHERE nim='$nim'");

if($q_daftar) {
	if($q_daftar->num_rows > 0) {
		$r_daftar = $q_daftar->fetch_object();
		$kd_daftar = $r_daftar->kd_daftar;
	}
}

$status = 'ACC';

if($update = mysqli_query($connect,"UPDATE tb_daftar SET status='$status' WHERE kd_daftar='$kd_daftar'")) {
	echo "<script>alert('Berhasil Meng-ACC Judul Skripsi');</script>";
	echo "<meta http-equiv='refresh' content='0; url=lihat-mahasiswa.php'>";
} else {
	echo "<script>alert('Gagal Meng-ACC Judul Skripsi');</script>";
	echo "<meta http-equiv='refresh' content='0; url=lihat-mahasiswa.php'>";
}

$connect->close();
exit();
die();

?>