<?php

include "../koneksi.php";

$nidn = $_POST['nidn'];
$nama = $_POST['nama'];
$alamat = $_POST['alamat'];
$jenis_kelamin = $_POST['jenis_kelamin'];
$no_telp = $_POST['no_telp'];
$email = $_POST['email'];;

if($simpan = mysqli_query($connect,"INSERT INTO tb_dosen (nidn, nama, alamat, jenis_kelamin, no_telp, email) VALUES ('$nidn','$nama','$alamat','$jenis_kelamin','$no_telp','$email')")) {
	$username = $nidn;
	$password = md5($nidn);
	$hak_akses = "Dosen";
	mysqli_query($connect,"INSERT INTO tb_user VALUES ('','$nama','$username','$password','$email','$hak_akses')");
	echo "<script>alert('Berhasil Simpan Data Dosen');</script>";
	echo "<meta http-equiv='refresh' content='0; url=data-dosen.php'>";
} else {
	echo "<script>alert('Gagal Simpan Data Dosen');</script>";
	echo "<meta http-equiv='refresh' content='0; url=data-dosen.php'>";
}

$connect->close();
exit();

?>