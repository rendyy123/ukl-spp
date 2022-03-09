<?php
if($_POST){
    $nis=$_POST['nis'];
    $nama_siswa=$_POST['nama_siswa'];
    $id_kelas=$_POST['id_kelas'];
    $alamat=$_POST['alamat'];
    $telp=$_POST['telp'];
    $username=$_POST['username'];
    $password=$_POST['password'];


    if(empty($nama_siswa)){
        echo "<script>alert('nama siswa tidak boleh kosong');location.href='tambah_data_siswa.php';</script>";

    } elseif(empty($alamat)){
        echo "<script>alert('alamat tidak boleh kosong');location.href='ubah_data_siswa.php';</script>";
    } elseif(empty($telp)){
        echo "<script>alert('nomor telepon tidak boleh kosong');location.href='ubah_data_siswa.php';</script>";
    } else {
        include "koneksi.php";
        $insert=mysqli_query($conn,"insert into siswa ( nis, nama_siswa, id_kelas, alamat, telp ,username ,password) value ('".$nis."','".$nama_siswa."','".$id_kelas."','".$alamat."','".$telp."','".$username."','".md5($password)."')") or die(mysqli_error($conn));
        if($insert){
            echo "<script>alert('Sukses menambahkan siswa');location.href='tampil_siswa.php';</script>";
        } else {
            echo "<script>alert('Gagal menambahkan siswa');location.href='proses_tambah_siswa.php';</script>";
        }
    }
}
?>