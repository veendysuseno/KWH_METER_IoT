<?php 
session_start();
include('config/connection.php');
$username = $_POST['username'];
$password = $_POST['password'];

$query = "SELECT * FROM admin WHERE username='$username' and password='$password'";
$data = mysqli_query($conn, $query);
$cek = mysqli_num_rows($data);

if($cek > 0){
    $_SESSION['username'] = $username;
    $_SESSION['status'] = "login";
    header("location: index.php");
}else{
    header("location: login.php?pesan=gagal");
}
