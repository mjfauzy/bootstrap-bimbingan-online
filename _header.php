<!doctype html>
<html lang="en">
<head>
  <title>Sistem Informasi Menajemen Skripsi</title>
  <meta content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" name="viewport"/>
  <meta content="Edi Sutrisno" name="author"/>
  <link rel="stylesheet" href="bootstrap/css/bootstrap.css"/>
  <link rel="stylesheet" href="datatables/dataTables.bootstrap.css"/>
  <script src="js/jquery-1.11.2.min.js"></script>
  <script src="bootstrap/js/bootstrap.js"></script>
  <script src="datatables/jquery.dataTables.js"></script>
  <script src="datatables/dataTables.bootstrap.js"></script>
</head>
<body>

<section id="banner">
  <div class="inner">
    <h3 style="color: #blue;">SISTEM INFORMASI MANAJEMEN SKRIPSI</h3>
	    <h3 style="color: #blue;">TEKNIK INFORMATIKA</h3>
	<h1 style="color: #blue;">UNIVERSITAS PAMULANG</h1>
    <p style="color: #blue; font-size: 18px;">Jln. Surya Kencana No.1 Pamulang, Tangerang Selatan, Banten</p>
  </div>
</section>

<nav class="navbar navbar-default">
  <div class="container-fluid">
    <ul class="nav navbar-nav navbar-right">
      <li><a href="index.php">Beranda</a></li>
	  	 <li><a href="proses_tampil_jadwal.php">Jadwal</a></li>
	  <li><a class="dropdown-toggle" data-toggle="dropdown" href="#">Ketentuan <span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="pedoman_penulisan.php">Pedoman Penuliasan </a></li>
          <li><a href="data-kriteria-bobot.php">Mekanisme Proses</a></li>
          <li><a href="data-user.php">Peraturan</a></li>
		    </ul> </li> 
      <li><a href="#" data-toggle="modal" data-target="#login-modal">Login</a> 
    </ul>
  </div>
</nav>
<div class="container">    
    <div class="modal fade" id="login-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1>Login to Your Account</h1><br>
                </div>
                <div class="modal-body">
                  <form action="check-login.php" method="post">
                    <div class="form-group">
                        <input type="text" name="username" placeholder="Username" class="form-control" required="true" />
                    </div>
                    <div class="form-group">
                        <input type="password" name="password" placeholder="Password" class="form-control" required="true" />
                    </div>
                    <div class="text-right">
                        <button class="btn btn-success" type="submit"><span class="glyphicon glyphicon-log-in"></span> Login</button>
                        <button class="btn btn-danger" type="reset" data-dismiss="modal" aria-hidden="true"><span class="glyphicon glyphicon-remove"></span> Batal</button>
                    </div>
                  </form>
                </div>
                <div class="modal-footer">
                  <a href="#">Register</a> - <a href="#">Forgot Password</a>
                </div>
            </div>
        </div>
    </div>