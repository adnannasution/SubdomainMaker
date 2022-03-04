<?php
session_start();

include"konek.php";

$nip=htmlspecialchars($_POST['nip']);
$nama=htmlspecialchars($_POST['nama']);
$instansi=htmlspecialchars($_POST['instansi']);
$jabatan=htmlspecialchars($_POST['jabatan']);
$email=htmlspecialchars($_POST['email']);
$hp=htmlspecialchars($_POST['hp']);

$pass=htmlspecialchars($_POST['pass']);

$passok=htmlspecialchars($_POST['pass']);

$pass=md5($pass);


$token=rand(1111, 9999);

$cek=mysqli_query($konek,"select * from tabelpengguna where email='$email'");
$hitunge=mysqli_num_rows($cek);


$cek2=mysqli_query($konek,"select * from tabelpengguna where nip='$nip'");
$hitunge2=mysqli_num_rows($cek2);



if($hitunge==0 or $hitunge2==0)
{ 
$hasil=mysqli_query($konek,"insert into tabelpengguna(nip, nama, instansi, jabatan, email, hp, pass, passok, token) values('$nip','$nama','$instansi','$jabatan','$email','$hp','$pass','$passok','$token')");



include"kirimpesan.php";

print"<script>window.location='login?type=new'</script>";
}
else
{
print"<script>window.location='register?type=sudah'</script>";
}


?>