<?php
session_start();

include"../konek.php";

$id=$_POST['id'];
$status=$_POST['status'];
$nosurat=$_POST['nosurat'];
$ket=$_POST['ket'];

if($status=='teruskan')
{
$hasil=mysqli_query($konek,"update tabelmohon set teruskan='$status' where id='$id'");
}
else
{
$hasil=mysqli_query($konek,"update tabelmohon set status='$status', ket='$ket', nosuratku='$nosurat' where id='$id'");
}



if($hasil)
{
$_SESSION['pesanedit']='sukses';

echo '<script>window.location="data"</script>';
}

?>