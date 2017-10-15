<?php

include "../koneksi.php";

$nidn = $_POST['nidn'];
$nama = $_POST['nama'];
$alamat = $_POST['alamat'];
$jenis_kelamin = $_POST['jenis_kelamin'];
$no_telp = $_POST['no_telp'];
$email = $_POST['email'];

if($simpan = mysqli_query($connect,"UPDATE tb_dosen SET nama='$nama',alamat='$alamat',jenis_kelamin='$jenis_kelamin',no_telp='$no_telp',email='$email' WHERE nidn='$nidn'")) {
	echo "<script>alert('Berhasil Update Data Dosen');</script>";
	echo "<meta http-equiv='refresh' content='0; url=data-dosen.php'>";
} else {
	echo "<script>alert('Gagal Update Data Dosen');</script>";
	echo "<meta http-equiv='refresh' content='0; url=data-dosen.php'>";
}

$connect->close();
exit();

?>