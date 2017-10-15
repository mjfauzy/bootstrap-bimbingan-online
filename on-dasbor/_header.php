<?php

session_start();
require '../koneksi.php';

if($_SESSION['username'] == '' ||$_SESSION['username'] == NULL) {
  header('location:../index.php');
}

?>

<!doctype html>
<html lang="en">
<head>
  <title>Sistem management bimbingan skripsi</title>
  <meta content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" name="viewport"/>
  <meta content="Edi" name="author"/>
  <link rel="stylesheet" href="../bootstrap/css/bootstrap.css"/>
  <link rel="stylesheet" href="../datatables/dataTables.bootstrap.css"/>
  <script src="../js/jquery-1.11.2.min.js"></script>
  <script src="../bootstrap/js/bootstrap.js"></script>
  <script src="../datatables/jquery.dataTables.js"></script>
  <script src="../datatables/dataTables.bootstrap.js"></script>
  <script type="text/javascript">
    var timer = null;
    function move() {
      window.location = 'hasil-penilaian.php';
    }
  </script>
</head>
<body>

<section id="banner">
  <div class="inner">
    <h3 style="color: blue;">SISTEM INFORMASI PENDAFTARAN SKRIPSI</h3>
	    <h3 style="color: blue;">TEKNIK INFORMATIKA</h3>
	<h1 style="color: blue;">UNIVERSITAS PAMULANG</h1>
    <p style="color: blue; font-size: 18px;">Jln. Surya Kencana No.1 Pamulang, Tangerang Selatan, Banten</p>
  </div>
</section>

<nav class="navbar navbar-default">
  <div class="container-fluid">
    <ul class="nav navbar-nav navbar-right">
      <li><a href="index.php">Beranda</a></li>
      <li class="dropdown">
      <?php if($_SESSION['hak_akses'] == 'Admin') { ?>
        <a class="dropdown-toggle" data-toggle="dropdown" href="#">Master Data <span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="data-dosen.php">Data Dosen</a></li>
		  <li><a href="data-mahasiswa.php">Data Mahasiswa</a></li>
          <li><a href="data-user.php">Data Users</a></li>
		  <li><a href="data-jadwal.php">Data Jadwal</a></li>
        </ul> 
      </li>
		<li><a href="data-peserta.php">Peserta Skripsi</a></li>
		<li><a href="input_jadwal.php">Jadwal Sidang</a></li>
      <?php } elseif($_SESSION['hak_akses'] == 'Mahasiswa') { ?>
		<li><a href="daftar.php">Pendaftaran</a></li>
		<li><a href="bimbingan-online-mhs.php">Bimbingan Online</a></li>
		<li><a href="daftar.php">Ubah Password</a></li>
	 
	 
	 <?php } elseif($_SESSION['hak_akses'] == 'Dosen') { ?>
		<li><a href="lihat-mahasiswa.php">Lihat Mahasiswa</a></li>
    <li><a href="bimbingan-online-dsn.php">Bimbingan Online</a></li>
    <li><a href="input-nilai.php">Input Nilai</a></li>
		<li><a href="daftar.php">Ubah Password</a></li>
	  <?php } ?>
      <li><a href="check-logout.php" title="Logout"><?php echo "".$_SESSION['nama']." (".$_SESSION['username'].")"; ?> <span class="glyphicon glyphicon-log-out"></span></a></li>  
    </ul>
  </div>
</nav>
    
    <div class="container">     
      