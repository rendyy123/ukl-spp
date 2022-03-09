<?php
session_start();
unset($_SESSION["id_petugas"]);
unset($_SESSION["nama_petugas"]);
header("Location:index.php");
?>