<?php
include "../koneksi.php";

$nim = $_POST['nim'];
$nama = $_POST['nama'];
$alamat = $_POST['alamat'];
$jenis_kelamin = $_POST['jenis_kelamin'];
$no_telp = $_POST['no_telp'];
$email = $_POST['email'];


if($simpan = mysqli_query($connect,"UPDATE tb_mahasiswa SET nama='$nama',alamat='$alamat',jenis_kelamin='$jenis_kelamin',no_telp='$no_telp',email='$email'  WHERE nim='$nim'")) {
	echo "<script>alert('Berhasil Update Data Mahasiswa');</script>";
	echo "<meta http-equiv='refresh' content='0; url=data-mahasiswa.php'>";
} else {
	echo "<script>alert('Gagal Update Data Mahasiwa');</script>";
	echo "<meta http-equiv='refresh' content='0; url=data-mahasiswa.php'>";
}

$connect->close();
exit();

?>