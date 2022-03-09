<?php
include("koneksi.php");
if(isset($_POST['simpan'])){
    $id_kelas = $_POST['id_kelas'];
    $nama_kelas = $_POST['nama_kelas'];
    $jurusan = $_POST['jurusan'];
    $angkatan = $_POST['angkatan'];

    $sql = "UPDATE kelas SET nama_kelas='$nama_kelas', jurusan='$jurusan', angkatan='$angkatan' WHERE id_kelas=$id_kelas";
    $query = mysqli_query($conn, $sql);

    if($query){
        header('Location: tampil_kelas.php');
    }else{
        die("Gagal menyimpan perubahan");
    }
}
?>