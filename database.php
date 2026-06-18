<?php
$host = "localhost";
$user = "root"; 
$pass = "";     
$db   = "DB_SIMULASI_PBO_TI-1D_MUHAMMADFATIHABDULAZIZ"; 

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die("Koneksi database gagal: " . $conn->connect_error);
}
?>
