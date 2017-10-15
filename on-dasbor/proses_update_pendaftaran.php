<?php

session_start();
include "../koneksi.php";

$kd_daftar = $_POST['kd_daftar'];
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

if($update = mysqli_query($connect,"UPDATE tb_daftar SET no_hp='$no_hp',sks='$sks',ipk='$ipk',judul='$judul_skripsi' WHERE kd_daftar='$kd_daftar'")) {
	$q_dospem = mysqli_query($connect,"SELECT nidn FROM tb_daftar WHERE kd_daftar='$kd_daftar'");
	if($q_dospem) {
		if($q_dospem->num_rows > 0) {
			$r_dospem = $q_dospem->fetch_object();
			if($r_dospem->nidn != $nidn) {
				$q_dospem_baru = mysqli_query($connect,"UPDATE tb_daftar SET nidn='$nidn'");
				$q_dosen_baru = mysqli_query($connect,"SELECT kuota_bimbingan FROM tb_dosen WHERE nidn='$nidn'");
				if($q_dosen_baru) {
					if($q_dosen_baru->num_rows > 0) {
						$r_dosen_baru = $q_dosen_baru->fetch_object();
						$kuota_bimbingan = $r_dosen_baru->kuota_bimbingan;
						$update_kuota = $kuota_bimbingan-1;
						mysqli_query($connect,"UPDATE tb_dosen SET kuota_bimbingan='$update_kuota' WHERE nidn='$nidn'");
					}
				}
				$nidn_lama = $r_dospem->nidn;
				$q_dosen = mysqli_query($connect,"SELECT kuota_bimbingan FROM tb_dosen WHERE nidn='$nidn_lama'");
				if($q_dosen) {
					if($q_dosen->num_rows > 0) {
						$r_dosen = $q_dosen->fetch_object();
						$kuota_bimbingan = $r_dosen->kuota_bimbingan;
						$update_kuota = $kuota_bimbingan+1;
						mysqli_query($connect,"UPDATE tb_dosen SET kuota_bimbingan='$update_kuota' WHERE nidn='$nidn_lama'");
					}
				}
			}
		}
	}
	echo "<script>alert('Berhasil Update Data Pendaftaran');</script>";
	echo "<meta http-equiv='refresh' content='0; url=daftar.php'>";
} else {
	echo "<script>alert('Gagal Update Data Pendaftaran');</script>";
	echo "<meta http-equiv='refresh' content='0; url=daftar.php'>";
}

$connect->close();
exit();
die();

?>