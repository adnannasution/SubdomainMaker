<?php



$pesan="<center>

<center>
<img src='https://media.istockphoto.com/vectors/blue-paper-speech-banner-with-word-thank-you-on-white-background-vector-id1165857016?k=20&m=1165857016&s=170667a&w=0&h=WhNTdyOS-XnNY8WU9qTl7gW0_XmTaE--Ony1N3vBPEc=' style='width:20%'>
</center>

<h4>Anda baru saja mendaftar di aplikasi Subdomain Maker</h4>

<br><br>
Berikut akun anda : 
<br>
Username : $email
<br>Password : $passok

<br><br>
Klik link dibawah ini untuk konfirmasi 
<br><br>

<a href='https://subdomainmaker.deliserdangkab.go.id/cekakun?token=$token'>$pass</a>

</center>
";




include "classes/class.phpmailer.php";
$mail = new PHPMailer; 
$mail->IsSMTP();
$mail->SMTPSecure = 'ssl'; 
$mail->Host = "deliserdangkab.go.id"; //host masing2 provider email
$mail->SMTPDebug = 2;
$mail->Port = 465;
$mail->SMTPAuth = true;
$mail->Username = "diskominfo@deliserdangkab.go.id"; //user email
$mail->Password = "Diskominfo123"; //password email 
$mail->SetFrom("diskominfo@deliserdangkab.go.id","Admin Subdomain"); //set email pengirim
$mail->Subject = "Email Konfirmasi"; //subyek email
$mail->AddAddress("$email","$nama");  //tujuan email
$mail->MsgHTML("$pesan");
if($mail->Send())  echo "Message has been sent";
else echo "Failed to sending message";


/*

include "classes/class.phpmailer.php";
$mail = new PHPMailer; 
$mail->IsSMTP();
$mail->SMTPSecure = 'ssl'; 
$mail->Host = "coas.online"; //host masing2 provider email
$mail->SMTPDebug = 2;
$mail->Port = 465;
$mail->SMTPAuth = true;
$mail->Username = "admin@coas.online"; //user email
$mail->Password = "coas12345##"; //password email 
$mail->SetFrom("admin@coas.online","Admin COAS"); //set email pengirim
$mail->Subject = "Email Konfirmasi"; //subyek email
$mail->AddAddress("adnan.buyung01@gmail.com","$nama");  //tujuan email
$mail->MsgHTML("$pesan");
if($mail->Send()) echo "";
else echo "";
*/
?>