<?php
$subjek='Konfirmasi email';

$pesan="
<center>
<h2>Terima kasih atas pendaftaran Anda di Subdomain maker Deli Serdang, <br>Silahkan klik pada link berikut untuk mengaktifkan keanggotaan Anda secara otomatis.</h2>

<br><br>

<a href='https://subdomainmaker.deliserdangkab.go.id/cekakun?token=$token' style='width:100px; background-color: #0000CC; padding:20px; color:WHITE; text-decoration:none; font-family:Arial, Helvetica, sans-serif'><B>KONFIRMASI AKUN</B></a>

<br><br><br>
Berikut akun anda : 
<br>
<h4>
<table width='400px'>
<tr>
<td>Username </td> <td> : $email </td>
</tr>

<tr>
<td>Password </td> <td> : $passok </td>
</tr>
</table>
</h4>


</center>


<br><br>

<hr>

DISCLAIMER :

<br><i>This electronic mail and/ or any files transmitted with it may contain confidential or copyright information of Diskominfo Deli Serdang. and/ or its Subsidiaries. If you are not an intended recipient, you must not keep, forward, copy, use, or rely on this electronic mail, and any such action is unauthorized and prohibited. If you have received this electronic mail in error, please reply to this electronic mail to notify the sender of its incorrect delivery, and then delete both it and your reply. Finally, you should check this electronic mail and any attachments for the presence of viruses. Diskominfo Deli Serdang accepts no liability for any damages caused by any viruses transmitted by this electronic mail.</i>

";


use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require_once "library/PHPMailer.php";
require_once "library/Exception.php";
require_once "library/OAuth.php";
require_once "library/POP3.php";
require_once "library/SMTP.php";
 
	$mail = new PHPMailer;
 
	//Enable SMTP debugging. 
	//$mail->SMTPDebug = 3;                               
	//Set PHPMailer to use SMTP.
	$mail->isSMTP();            
	//Set SMTP host name                          
	$mail->Host = "tls://smtp.gmail.com"; //host mail server
	//Set this to true if SMTP host requires authentication to send email
	$mail->SMTPAuth = true;                          
	//Provide username and password     
	$mail->Username = "subdomainmaker01@gmail.com";   //nama-email smtp          
	$mail->Password = "subdo12345";           //password email smtp
	//If SMTP requires TLS encryption then set it
	$mail->SMTPSecure = "tls";                           
	//Set TCP port to connect to 
	$mail->Port = 587;                                   
 
	$mail->From = "subdomainmaker01@gmail.com"; //email pengirim
	$mail->FromName = "Admin Subdomain"; //nama pengirim
 
	 $mail->addAddress($email, $nama); //email penerima
 
	$mail->isHTML(true);
 
	$mail->Subject = $subjek; //subject
    $mail->Body    = $pesan; //isi email
        $mail->AltBody = "Admin"; //body email (optional)
 
	if(!$mail->send()) 
	{
	   // echo "Mailer Error: " . $mail->ErrorInfo;
	} 
	else 
	{
	   // echo "Message has been sent successfully";
	}



?>
