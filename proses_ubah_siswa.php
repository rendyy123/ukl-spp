<?php
if($_POST){
    $nisn=$_POST['nisn'];
    $nis=$_POST['nis'];
    $nama_siswa=$_POST['nama_siswa'];
    $id_kelas=$_POST['id_kelas'];
    $alamat=$_POST['alamat'];
    $telp=$_POST['telp'];
    $username=$_POST['username'];
    $password=$_POST['password'];

    if(empty($nama_siswa)){
        echo "<script>alert('nama siswa tidak boleh kosong');location.href='ubah_siswa.php';</script>";

    } elseif(empty($alamat)){
        echo "<script>alert('alamat tidak boleh kosong');location.href='ubah_siswa.php';</script>";
    } elseif(empty($telp)){
        echo "<script>alert('nomor telepon tidak boleh kosong');location.href='ubah_siswa.php';</script>";
    } elseif(empty($username)){
        echo "<script>alert('username tidak boleh kosong');location.href='ubah_siswa.php';</script>";
    } elseif(empty($password)){
        echo "<script>alert('password tidak boleh kosong');location.href='ubah_siswa.php';</script>";
    } else {
        include "koneksi.php";
        $update=mysqli_query($conn,"update siswa set nama_siswa='".$nama_siswa."',id_kelas='".$id_kelas."',  alamat='".$alamat."', telp='".$telp."',username='".$username."',password='".$password."' where nisn = '".$nisn."' ") or die(mysqli_error($conn));
            if($update){
                echo "<script>alert('Sukses update siswa');location.href='tampil_siswa.php';</script>";
            } else {
                echo "<script>alert('Gagal update siswa');location.href='ubah_siswa.php?nisn=".$nisn."';</script>";
            }
        }  
}
?>