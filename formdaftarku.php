<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Domain maker</title>


<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">

<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Merriweather:wght@300&display=swap" rel="stylesheet">


<link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

<style type="text/css">

*{
margin:0px;
padding:0px;
}

</style>

</head>

<body style="font-family: 'Merriweather', serif;">


<img src="hdhd.jpg" style="width:100%; height:250px" />



<div style="position:absolute; z-index:2; left:10px; top:10px; color:white">
<h1>Subdomain <br />Maker</h1>
</div>







<div class=" card p-0 col-4 shadow-lg" style="position:absolute; z-index:2; left:33%; top:10%; background-color:white; padding:20px" data-aos="fade-up">

<div class="card-header">
<h5>Register</h5>
</div>

<div class="card-body">
<?php
error_reporting(0);

$type=$_GET['type'];

if($type=='sudah')
{
print"<div class='alert alert-danger'>Email/NIP sudah terdaftar</div>";
}
?>


<form action="inputdaftar.php" method="post">

<div class="form-group">
<label>NIP</label>
<input type="text" name="nip"  class="form-control" pattern="[0-9]{18}" required>
</div>


<div class="form-group">
<label>Nama</label>
<input type="text" name="nama"  class="form-control" required>
</div>


<div class="form-group">
<label>Instansi</label>
<input type="text" name="instansi"  class="form-control" required>
</div>


<div class="form-group">
<label>Jabatan</label>
<input type="text" name="jabatan"  class="form-control" required>
</div>


<div class="form-group">
<label>No. HP</label>
<input  name="hp" id="nama" type="number" maxlength="13"  class="form-control" required>
</div>


<div class="form-group">
<label>Email</label>
<input type="email" name="email"  class="form-control" required>
</div>


<div class="form-group">
<label>Password</label>
<input type="password" name="pass" id="pass" onKeyUp="pesan()"  class="form-control" required>
</div>

<p align="right">
	  <label>
        <input type="checkbox" class="lihatpass" />
        <span><small>show password</small></span>
      </label>
</p>


<div id="muncul"></div>

<script type="text/javascript">
	$(document).ready(function(){		
		$('.lihatpass').click(function(){
			if($(this).is(':checked')){
				$('#pass').attr('type','text');
			}else{
				$('#pass').attr('type','password');
			}
		});
	});
</script>




<script type="text/javascript">
	
	function pesan(){
	var passok = document.getElementById("pass").value;
		
if (passok.length < 6)
{
document.getElementById("muncul").innerHTML = "<div class='alert alert-danger'>jumlah password min. 6 karakter</div>";
document.getElementById("kirim").disabled = true;
}
else
{
document.getElementById("kirim").disabled = false;
document.getElementById("muncul").innerHTML = "";
}
	
	
	}
		
	
</script>

</div>

<div class="card-footer">

<button type="submit" name="submit" id="kirim" class="btn btn-info" />Daftar</button>
<a href="login" class="btn">login</a>

</div>

</form>

</div>

<script>   
     AOS.init(); 
</script>








</body>
</html>
