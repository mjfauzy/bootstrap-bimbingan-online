<?php

include "../koneksi.php";


$nama = $_POST['nama'];
$nilai = $_POST['nilai'];


if($simpan = mysqli_query($connect,"UPDATE mahasiswa SET nilai='$nilai' Where nama='$nama'")) {
	echo "<script>alert('Berhasil Simpan Data Nilai');</script>";
	echo "<meta http-equiv='refresh' content='0; url=hasil-penilaian.php'>";
} else {
	echo "<script>alert('Gagal Simpan Data Nilai');</script>";
	echo "<meta http-equiv='refresh' content='0; url=hasil-penilaian.php'>";
}

$connect->close();
exit();

?>