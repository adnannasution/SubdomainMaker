<?php
session_start();

include"../konek.php";

$id=$_POST['id'];
$kethasil=nl2br($_POST['kethasil']);




$hasil=mysqli_query($konek,"update tabelmohon set kethasil='$kethasil' where id='$id'");


if($hasil)
{
$_SESSION['pesanedit']='sukses';

echo '<script>window.location="data"</script>';
}

?>