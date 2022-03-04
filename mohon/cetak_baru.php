<?php
define('_MPDF_PATH','mpdf/');
include(_MPDF_PATH . "mpdf.php");

$nama_dokumen='cetak-lapdforan';
$mpdf=new mPDF('utf-8', 'A4', 11, 'Georgia');

//$mpdf->AddPage('L');

ob_start();
?>

<html>
<head>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

</head>

<style>
@media print
{    
    .no-print, .no-print *
    {
        display: none !important;
    }
	

}
</style>


<body style="padding:20px; font-family:'Times New Roman', Times, serif">

		<?php

        $id = $_GET['id'];
		
			
		include"../konek.php";
							  
		$tampil=mysqli_query($konek,"select * from tabelmohon join tabelpengguna on tabelmohon.email=tabelpengguna.email where tabelmohon.id='$id'");
		$data=mysqli_fetch_array($tampil);
		
	?>
	
	
<img src="kopsurat.jpg" style="width:100%">
<div class="col-12" style="padding:10px; font-size:18px">


<div class="col-6" style="float:left; border:0px black solid; padding:20px; padding-left:100px">
<table style="width:100%">

<tr>
<td width="20%">Nomor</td>
<td> : <?php print"$data[nosuratku]"; ?></td>
</tr>

<tr>
<td>Sifat</td>
<td> : Biasa</td>
</tr>

<tr>
<td>Lamp.</td>
<td> : </td>
</tr>

<tr>
<td>Perihal</td>
<td> : Penerbitan Nama SubDomain</td>
</tr>

</table>


</div>



<div class="col-6" style="float:left; border:0px black solid; padding:20px; font-size:18px">

Lubuk Pakam,                        
<br>Kepada Yth:
<br><?php print"$data[nama]"; ?>
<br><?php print"$data[jabatan]"; ?>
<br>di
<br>&nbsp;&nbsp;&nbsp; Tempat,

</div>


</div>
<br><br><br><br><br><br>
<div class="col-12" style="padding:100px; font-size:18px; padding-left:15%; padding-right:10%; line-height:35px; text-align:justify">
Menindaklanjuti Surat dari <?php print"$data[instansi]"; ?> dengan Nomor <?php print"$data[nosurat]"; ?>  

<br><br>
Dengan ini kami sampaikan bahwa penerbitan Nama Subdomain pada alamat url: <?php print"<b>$data[namasub].deliserdangkab.go.id</b>"; ?> sudah bisa diakses secara online, sementara itu untuk data IP, username dan password VPS, serta VPN dapat dilihat dan diakses pada aplikasi Subdomain Maker Dinas Kominfo Kabupaten Deli Serdang.
(https://subdomainmaker.deliserdangkab.go.id)

<br><br>
Demikian informasi ini kami sampaikan, atas perhatian dan kerja samanya diucapkan terima kasih.

	
<br><br><br><br>

<p align="right">
<img src="capok.png" style="width:40%">
</p>

</div>







</body>
</html>



<?php
$html = ob_get_contents();
ob_end_clean();

$mpdf->WriteHTML(utf8_encode($html));
$mpdf->Output("".$nama_dokumen.".pdf" ,'D');
$db1->close();
?>
