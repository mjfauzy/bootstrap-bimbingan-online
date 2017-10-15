<?php

session_start();
include "../koneksi.php";


$nim = $_SESSION['username'];
$no_hp = $_POST['no_hp'];
$sks = $_POST['sks'];
$ipk = $_POST['ipk'];
$judul_skripsi = $_POST['judul_skripsi'];
$nidn = $_POST['dospem'];
$status = 'Belum ACC';

if($sks < 140) {
	echo "<script>alert('SKS Anda Belum Mencukupi');</script>";
	echo "<meta http-equiv='refresh' content='0; url=daftar.php'>";
	die();
}

if($ipk < 2.5) {
	echo "<script>alert('IPK Anda Kurang dari 2.5');</script>";
	echo "<meta http-equiv='refresh' content='0; url=daftar.php'>";
	die();
}

if($simpan = mysqli_query($connect,"INSERT INTO tb_daftar VALUES ('','$nim','$no_hp','$sks','$ipk','$judul_skripsi','$nidn','$status')")) {
	$q_dosen = mysqli_query($connect,"SELECT * FROM tb_dosen WHERE nidn='$nidn'");
	if($q_dosen) {
		if($q_dosen->num_rows > 0) {
			while($r_dosen = $q_dosen->fetch_object()) {
				$kuota_bimbingan = $r_dosen->kuota_bimbingan;
				$update_kuota = $kuota_bimbingan-1;
				$q_update = mysqli_query($connect,"UPDATE tb_dosen SET kuota_bimbingan='$update_kuota' WHERE nidn='$nidn'");
			}
		}
	}
	echo "<script>alert('Berhasil Simpan Data Pendaftaran');</script>";
	echo "<meta http-equiv='refresh' content='0; url=daftar.php'>";
} else {
	echo "<script>alert('Gagal Simpan Data Pendaftaran');</script>";
	echo "<meta http-equiv='refresh' content='0; url=daftar.php'>";
}

$connect->close();
exit();

?>