<?php

include "../koneksi.php";


$nim = $_POST['nim'];
$nama = $_POST['nama'];
$alamat = $_POST['alamat'];
$jenis_kelamin = $_POST['jenis_kelamin'];
$no_telp = $_POST['no_telp'];
$email = $_POST['email'];

if($simpan = mysqli_query($connect,"INSERT INTO tb_mahasiswa VALUES ('$nim','$nama','$alamat','$jenis_kelamin','$no_telp','$email')")) {
	$username = $nim;
	$password = md5($nim);
	$hak_akses = "Mahasiswa";
	mysqli_query($connect,"INSERT INTO tb_user VALUES ('','$nama','$username','$password','$email','$hak_akses')");
	echo "<script>alert('Berhasil Simpan Data Mahasiswa');</script>";
	echo "<meta http-equiv='refresh' content='0; url=data-mahasiswa.php'>";
} else {
	echo "<script>alert('Gagal Simpan Data Mahasiswa');</script>";
	echo "<meta http-equiv='refresh' content='0; url=data-mahasiswa.php'>";
}

$connect->close();
exit();

?>