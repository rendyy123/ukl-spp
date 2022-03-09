<?php
session_start();
if($_SESSION['status_login']!=true){
    header('location: ../index.php');
}
?>
<!doctype html>
<html lang="en">
  <head>
  	<title>Sidebar 09</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
		
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
		<link rel="stylesheet" href="aset/css/style.css">
  </head>
  <body>
		
		<div class="wrapper d-flex align-items-stretch">
			<nav id="sidebar">
				<div class="custom-menu">
					<button type="button" id="sidebarCollapse" class="btn btn-primary">
	        </button>
        </div>
	  		<div class="img bg-wrap text-center py-4" style="background-image: url(images/bg_1.jpg);">
	  			<div class="user-logo">
	  				<div class="img" style="background-image: url(images/logo.jpg);"></div>
	  				<h3>Pembayaran SPP</h3>
	  			</div>
	  		</div>
        <ul class="list-unstyled components mb-5">
          <li class="active">
            <a href="home.php"><span class="fa fa-home mr-3"></span> Home</a>
          </li>
          
          <li>
            <a href="tampil_siswa.php"><span class="fa fa-gift mr-3"></span> Siswa</a>
          </li>
          <li>
            <a href="tampil_kelas.php"><span class="fa fa-trophy mr-3"></span> Kelas</a>
          </li>
          <li>
            <a href="tampil_petugas.php"><span class="fa fa-trophy mr-3"></span> Petugas</a>
          </li>
          <li>
            <a href="tampil_spp.php"><span class="fa fa-trophy mr-3"></span> SPP</a>
          </li>
          <li>
            <a href="transaksi.php"><span class="fa fa-trophy mr-3"></span> Transaksi</a>
          </li>
          <li>
            <a href="history.php"><span class="fa fa-trophy mr-3"></span> History</a>
          </li>
          <li>
            <a href="laporan.php"><span class="fa fa-trophy mr-3"></span> Laporan</a>
          </li>
          <li>
            <a href="logout.php"><span class="fa fa-sign-out mr-3"></span> Sign Out</a>
          </li>
        </ul>

    	</nav>

        <!-- Page Content  -->
        <div id="content" class="p-4 p-md-5 pt-5">
        <?php
        include "koneksi.php";
        $qry_get_petugas = mysqli_query($conn, "select * from petugas where id_petugas = '".$_GET['id_petugas']."'");
        $dt_petugas = mysqli_fetch_array($qry_get_petugas);
        ?>
        <br><h3 align="center">Ubah petugas</h3>
        <form action = "proses_ubah_petugas.php" method = "post">
            <input type="hidden" value  = "<?php echo $dt_petugas['id_petugas']?>" name = "id_petugas">
            <?php
            /*
            '<?='(deprecated alias tidak disarankan) <?= itu kadang dipake sama xml
            <?xml xxxx itu sama dengan '<?php echo'(lebih recommend)
            */
            ?>

            Petugas :
            <input type="text" name="nama_petugas" value="" class="form-control">
            Username:
            <input type = "text" name = "username" value = "<?php echo $dt_petugas['username']?>" class = "form-control">
            Password :
            <input type = "text" name = "password" value = "<?php echo $dt_petugas['password']?>" class = "form-control">
            Level:
            <input type = "text" name = "level" value = "<?php echo $dt_petugas['level']?>" class = "form-control"><br>
            <input type = "submit" name = "simpan" value = "Ubah petugas" class = "btn btn-primary">
        </form>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" 
        integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" 
        crossorigin="anonymous"></script>
    </body>
</html>