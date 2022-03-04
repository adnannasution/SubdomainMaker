<?php
session_start();

error_reporting(0);


$email=$_POST['email'];
$pass=md5($_POST['pass']);

include"konek.php";

$tampil=mysqli_query($konek,"select * from tabelpengguna where email='$email' and pass='$pass'");
$hitung=mysqli_num_rows($tampil);
$data=mysqli_fetch_array($tampil);

if($hitung > 0)
{
$_SESSION['email']=$data['email'];
$_SESSION['nama']=$data['nama'];
$_SESSION['sebagai']=$data['sebagai'];

if($_SESSION['sebagai']!='')
{
print"<script>window.location='home/data?side=home'</script>";
}
else
{
print"<script>window.location='mohon/data?side=mohon'</script>";
}



}

else
{
print"<script>window.location='login?type=gagal'</script>";
}

?>

