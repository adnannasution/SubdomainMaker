<?php
include"konek.php";


$token=$_GET['token'];

$hasil=mysqli_query($konek,"update tabelpengguna set akun='ok' where token='$token'");

if($hasil)
{
print"<script>window.location='login?type=sukses'</script>";
}
?>
