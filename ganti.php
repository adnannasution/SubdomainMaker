<?php
session_start();

include"konek.php";

$email=$_SESSION['email'];

$passbaru=htmlspecialchars($_POST['passbaru']);

$passbaruok=htmlspecialchars($_POST['passbaru']);

$passbaru=md5($passbaru);


$hasil=mysqli_query($konek,"update tabelpengguna set pass='$passbaru', passok='$passbaruok' where email='$email'");


$_SESSION['pesanedit']='sukses'; 

echo '<script>window.location="home/data?pesan=edit data sukses"</script>';



?>