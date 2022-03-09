<?php
include "koneksi.php";
if($_POST){
    $nama_petugas = $_POST['nama_petugas'];
    $nama_siswa = $_POST['nama_siswa'];
    $tgl_bayar = $_POST['tgl_bayar']; 
    $bulan_spp = $_POST['bulan_spp']; 
    $tahun_spp = $_POST['tahun_spp']; 
    $status =$_POST['status'];
    $cek = mysqli_query($conn,"INSERT INTO pembayaran VALUES ('','$nama_petugas', '$nama_siswa', '$tgl_bayar', '$bulan_spp', '$tahun_spp', '$status')");
    if($cek){
        echo "<script>alert('Sukses menambahkan Transaksi');location.href='transaksi.php'</script>";
    }else{
        echo "<script>alert('Gagal menambahkan transaksi');location.href='tambah_transaksi.php'</script>";
    }
} else {
    echo 'a';
}
?>