<?php
session_start();

error_reporting(0);

$email=$_SESSION['email'];


include"../konek.php";


$temp=$_FILES['surat']['tmp_name'];
$name=$_FILES['surat']['name'];
$size=$_FILES['surat']['size'];
$type = $_FILES['surat']['type'];






$namasub=htmlspecialchars($_POST['namasub']);

$bahasa=htmlspecialchars($_POST['bahasa']);
$basisdata=htmlspecialchars($_POST['basisdata']);

$deskripsi=htmlspecialchars($_POST['deskripsi']);

$aplikasi=htmlspecialchars($_POST['aplikasi']);

$nosurat=htmlspecialchars($_POST['nosurat']);

$ip=htmlspecialchars($_POST['ip']);

$tanggal=date('d M Y');
$bulan=date('M');
$tahun=date('Y');




$format = pathinfo($name, PATHINFO_EXTENSION);
$format2 = pathinfo($name2, PATHINFO_EXTENSION);

if( ($format == "jpg") or ($format == "png") or ($format == "jpeg") or ($format == "pdf"))
{

  
$acak=rand(0000, 9999);

$name="$acak.$name";


 
$alamat='gambar/';
$copy=move_uploaded_file($temp, $alamat.$name);





$hasil=mysqli_query($konek,"insert into tabelmohon(ip, email, aplikasi, tanggal, namasub, bahasa, basisdata, deskripsi, surat, nosurat) values('$ip','$email','$aplikasi','$tanggal','$namasub','$bahasa','$basisdata','$deskripsi','$name','$nosurat')");


//------input graf

$cek=mysqli_query($konek,"select * from tabelgraf where bulan='$bulan' and tahun='$tahun'");
$hitung=mysqli_num_rows($cek);
$data3=mysqli_fetch_array($cek);

if($hitung==0)
{
$hasil=mysqli_query($konek,"insert into tabelmohon(bulan, tahun, jumlah) values('$bulan','$tahun','1')");
}
else
{
$jumlahok=$data3['jumlah']+1;

$edit=mysqli_query($konek,"update tabelgraf set jumlah='$jumlahok' where bulan='$bulan' and tahun='$tahun'");
}


//-----------

echo '<script>window.location="data.php?side=mohon&status=sukses"</script>';

$_SESSION['pesaninput']='sukses';

}
else
{
echo '<script>window.location="data.php?pesan=input data gagal"</script>';
}
?>