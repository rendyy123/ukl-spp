<?php
    include "koneksi.php";

?>
<!DOCTYPE html>
<html>
<?php
  
  ?>
    <head>
        <title>SPP</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="header/css/style.css">
      </head>
      <body>
        <div id="content" class="p-4 p-md-5 pt-5">
        <section class="section">
          <div class="section-header">
        </div>
        <div class="row">
              <div class="col-md-12">
                <div class="card">
                  <div class="card-header">
                    <h4>History Pembayaran</h4>
                    <div class="card-header-form">
                    </div>
                  </div>
        <form action="" method="get">
                      <table class="table">
                      <tr>
                      <td>NISN  :</td>
                      <td>
                      <input class="form-control" type="number" name="nisn" placeholder="--Masukan NISN--">
                      </td>
                      <td>
                      <button class="btn btn-success" type="submit" name="cari">Cari</button>
                      </td>
                      </tr>

                      </table>
                      </form>
                <?php 
                if (isset($_GET['nisn']) && $_GET['nisn']!='') {
                  $query = mysqli_query($conn, "SELECT * FROM siswa WHERE nisn='$_GET[nisn]'");
                  $data = mysqli_fetch_array($query);
                  $nisn = $data['nisn'];
                
                ?>

                <h2>DATA SISWA</h2>
                <table class="table table-striped">
                  <thead>
                    <tr>
                      <th scope="col">NISN</th>
                      <th scope="col">NAMA SISWA</th>
                      <th scope="col">ID KELAS</th>
                      
                    </tr>
                  </thead>
                  <tbody>
                    <td><?php echo $data['nisn']; ?></td>
                    <td><?php echo $data['nama_siswa']; ?></td>
                    <td><?php echo $data['id_kelas']; ?></td>
                  </tbody>
                </table>

                <h2>DATA SPP SISWA</h2>
              <table class="table table-striped">
                <thead> 
                  <tr>
               
               <th scope="col"> NISN</th>
                <th scope="col">Tanggal Bayar</th>
                <th scope="col">Bulan Bayar</th>
                <th scope="col">Tahun Bayar</th>
                <th scope="col">Jumlah</th>             
                <th scope="col">Status</th>

                  </tr>
                </thead>

                <tbody>
                  <?php 
    
              
                  $query = mysqli_query($conn,"SELECT * FROM pembayaran WHERE nisn='$data[nisn]' ORDER BY bulan_spp ASC");
                  
                  

                  while ($data=mysqli_fetch_array($query)) {
                    
                
                    echo "<tr>
                 
                          <td>  $data[nisn]</td>
                          <td>  $data[tgl_bayar]</td>
                          <td>  $data[bulan_spp]</td>
                          <td>  $data[tahun_spp]</td>
                          <td>  $data[jumlah]</td>                       
                          <td>  $data[status]</td>


                        </tr>";
                        
                  }

                   ?>

                </tbody>

              </table>  
                
    <?php 
    }
    if(isset($_GET['lunas'])){
      $id = $_GET['id'];
      $ambilData = mysqli_query($conn, "SELECT * FROM pembayaran JOIN spp ON pembayaran.id_spp=spp.id_spp 
                                      WHERE id_pembayaran = '$id'");
      $row = mysqli_fetch_assoc($ambilData);
      $sisa = $row['nominal'] - $row['jumlah_bayar'];
      $hasil = $row['jumlah_bayar'] + $sisa;
      $update = mysqli_query($conn, "UPDATE pembayaran SET jumlah_bayar='$hasil' WHERE id_pembayaran='$id'");
      if($update){
          echo "<script>alert('Data Berhasil Ditambahkan !');location.href='../transaction/transaksi.php';</script>";
      }
  }
    ?>      
        
        </div>
  </body>
</html>