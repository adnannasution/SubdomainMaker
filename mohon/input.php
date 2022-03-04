<?php
session_start();

error_reporting(0);

$email=$_SESSION['email'];


include"../konek.php";


$temp=$_FILES['surat']['tmp_name'];
$name=$_FILES['surat']['name'];
$size=$_FILES['surat']['size'];
$type = $_FILES['surat']['type'];


$temp2=$_FILES['coding']['tmp_name'];
$name2=$_FILES['coding']['name'];
$size2=$_FILES['coding']['size'];
$type2 = $_FILES['coding']['type'];



$namasub=htmlspecialchars($_POST['namasub']);
$ip=htmlspecialchars($_POST['ip']);
$bahasa=htmlspecialchars($_POST['bahasa']);
$basisdata=htmlspecialchars($_POST['basisdata']);
$framework=htmlspecialchars($_POST['framework']);
$deskripsi=htmlspecialchars($_POST['deskripsi']);
$sasaran=htmlspecialchars($_POST['sasaran']);
$aplikasi=htmlspecialchars($_POST['aplikasi']);

$nosurat=htmlspecialchars($_POST['nosurat']);

$tanggal=date('d M Y');
$bulan=date('M');
$tahun=date('Y');




$format = pathinfo($name, PATHINFO_EXTENSION);
$format2 = pathinfo($name2, PATHINFO_EXTENSION);

if( ($format == "jpg") or ($format == "png") or ($format == "jpeg") or ($format == "pdf") and ($format2 == "zip") or ($format2 == "rar"))
{

  
$acak=rand(0000, 9999);

$name="$acak.$name";

$name2="$acak.$name2";
 
$alamat='gambar/';
$copy=move_uploaded_file($temp, $alamat.$name);


$copy=move_uploaded_file($temp2, $alamat.$name2);


$hasil=mysqli_query($konek,"insert into tabelmohon(email, aplikasi, tanggal, namasub, ip, bahasa, basisdata, framework, deskripsi, sasaran, surat, coding, nosurat) values('$email','$aplikasi','$tanggal','$namasub','$ip','$bahasa','$basisdata','$framework','$deskripsi','$sasaran','$name','$name2','$nosurat')");


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

echo '<script>window.location="data?side=mohon&status=sukses"</script>';

$_SESSION['pesaninput']='sukses';

}
else
{
echo '<script>window.location="data?side=mohon&status=gagal"</script>';
}
?>