<?php
$server = "mysql:host=localhost;dbname=web";
$user="root";
$pass="";

$pdo=new PDO($server , $user ,$pass);

if($pdo){
    // echo "<script>alert('connected')</script>";
}
?>
