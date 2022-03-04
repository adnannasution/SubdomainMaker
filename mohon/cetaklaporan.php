<?php
define('_MPDF_PATH','mpdf/');
include(_MPDF_PATH . "mpdf.php");

$nama_dokumen='cetak-laporan';
$mpdf=new mPDF('utf-8', 'A4', 11, 'Georgia');

//$mpdf->AddPage('L');

ob_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>

 <style type="text/css">
  
  table{
   border-collapse:collapse;
  width:100%;
  }
  
  td{
 
  padding:5px;

  
  }
  
  
  th{
  text-align:center;
 
  padding:10px;

  }
  
  
  
  </style>
  

  
</head>
<body>


<?php
include"../konek.php";

$nip=$_GET['nip'];
$sekarang=$_GET['tanggal'];

$bulan=$_GET['bulan'];
$tahun=$_GET['tahun'];


$tampila=mysqli_query($konek,"select * from tabelpegawai where nip='$nip'"); 
$dataku=mysqli_fetch_array($tampila);

$tampilb=mysqli_query($konek,"select * from tabelpegawai where nama='$dataku[atasan]'"); 
$datamu=mysqli_fetch_array($tampilb);

?>

<center>
<h2><p align="center">Laporan Bulanan Pegawai</p></h2>
</center>

<b>
Bulan : <?php if($bulan==''){ print"$sekarang"; } else { print"$tahun-$bulan"; }?>
</b>

<table border="1">
<tr>
<td align="center">I.ATASAN LANGSUNG</td>
<td align="center">II.PNS YANG DINILAI</td>
</tr>

<tr>
<td>Nama &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <?php print"$datamu[nama]"; ?></td>
<td>Nama &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <?php print"$dataku[nama]"; ?></td>
</tr>

<tr>
<td>NIP &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <?php print"$datamu[nip]"; ?></td>
<td>NIP &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <?php print"$dataku[nip]"; ?></td>
</tr> 

<tr>
<td>Pangkat &nbsp;&nbsp;&nbsp;: <?php print"$datamu[pangkat]"; ?></td>
<td>Pangkat &nbsp;&nbsp;&nbsp;: <?php print"$dataku[pangkat]"; ?></td>
</tr>

<tr>
<td>Jabatan &nbsp;&nbsp;&nbsp;&nbsp;: <?php print"$datamu[jabatan]"; ?></td>
<td>Jabatan &nbsp;&nbsp;&nbsp;&nbsp;: <?php print"$dataku[jabatan]"; ?></td>
</tr> 

<tr>
<td>Unit Kerja : Bag. Perencanaan dan Keuangan Sekretariat Deli Serdang</td>
<td>Unit Kerja : Bag. Perencanaan dan Keuangan Sekretariat Deli Serdang</td>
</tr>


</table>



<table border="1" style="width:100%">
                <thead>
                <tr>
       
                 <th>No</th>
                  <th>Hari</th>
				  
				  <th>Tanggal</th>
				  <th>Kode Aktifitas</th>
				  <th>Aktifitas pegawai</th>
				  <th>jumlah</th>
				  <th>Satuan</th>
				  <th>Lama pengerjaan (menit)</th>
				  <th>Paraf atasan</th>
				 <th>Ket</th>	
					
                </tr>
                </thead>
                <tbody>
				
<?php



if($bulan!='' and $tahun!='')
{
$tampil=mysqli_query($konek,"select * from tabellaporan join tabelpegawai on tabellaporan.id_pegawai=tabelpegawai.id_pegawai join tabelkegiatan on tabellaporan.kodekegiatan=tabelkegiatan.kodekegiatan where nip='$nip' and tanggal like '%$tahun-$bulan%'");
}
else
{
$tampil=mysqli_query($konek,"select * from tabellaporan join tabelpegawai on tabellaporan.id_pegawai=tabelpegawai.id_pegawai join tabelkegiatan on tabellaporan.kodekegiatan=tabelkegiatan.kodekegiatan where nip='$nip' and tanggal like '%$sekarang%'");
}

$no=0;
while($data=mysqli_fetch_array($tampil))
{
$no++;	


$hari = date('l', strtotime($data['tanggal']));

?>	
 <tr>
 
<td><?php print"$no"; ?></td>
<td><?php print"$hari"; ?></td>
<td><?php print"$data[tanggal]"; ?></td>
<td align="center"><?php print"$data[kodekegiatan]"; ?></td>
<td><?php print"$data[kegiatan]"; ?></td>
<td align="center"><?php print"$data[jumlah]"; ?></td>
<td><?php print"$data[satuan]"; ?></td>
<td align="center"><?php print"$data[jumlahwaktu]"; ?></td>
<td align="center"><?php print"<img style='width:8%' src='ttd/$data[paraf]'>"; ?></td>

<td><?php print""; ?></td>


</tr>
<?php


}
?>   
</tbody>
</table>

<?php    
$tanggalsekarang=date('M Y');
?>







<p align="right">
Lubuk Pakam,  &nbsp;&nbsp;&nbsp;&nbsp;<?php print" $tanggalsekarang";?>
    
<table width="100%" border="0">
<tr>
<td align="center" width="50%">
<?php print"$datamu[jabatan]"; ?>
<br><br><br><br><br><br>


</td>

<td align="center">
<?php print"PNS yang melaporkan"; ?>
<br><br><br><br><br><br>
</td>

</tr>

<tr>
<td align="center" width="50%">
<?php print"$datamu[nama] <br> $datamu[nip]"; ?>
</td>
<td align="center">
<?php print"$dataku[nama] <br> $dataku[nip]"; ?>
</td>
</tr>
</table>


</body>
</html>


<?php
$html = ob_get_contents();
ob_end_clean();

$mpdf->WriteHTML(utf8_encode($html));
$mpdf->Output("".$nama_dokumen.".pdf" ,'D');
$db1->close();
?>