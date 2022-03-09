<?php 
session_start(); 
 $conn = mysqli_connect('localhost','root','','bayar_spp'); 
 $username = stripslashes($_POST['username']); 
 $password = md5($_POST['password']); 
$query = "SELECT * FROM petugas where username='$username' AND password='$password'"; 
$row = mysqli_query($conn,$query); 
$data = mysqli_fetch_array($row);  
$cek = mysqli_num_rows($row);

if($cek > 0){
 if($data['level']== 'admin'){ 
     $_SESSION['level']='admin'; 
     $_SESSION['username'] = $data['username']; 
     $_SESSION['id_petugas'] = $data['id_petugas']; 
     header('location:admin/home.php'); 
    }else if($data['level'] =='petugas'){
    $_SESSION['level']='petugas';
    $_SESSION['username'] = $data['username'];
    $_SESSION['id_petugas']= $data['id_petugas']; 
    header('location:petugas/tampil_petugas.php'); 
    }else if($data['level']== 'siswa'){ 
    $_SESSION['level'] ='siswa';
    $_SESSION['username'] = $data['username'];
    $_SESSION ['id_petugas'] = $data['id_petugas'] ;
    header('location:siswa/tampil_siswa.php');} 
  }else{
       $msg = 'Username Atau Password Salah';
        header('location:home.php?msg='.$msg); }