

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







<div class=" card p-0 col-3 shadow-lg" style="position:absolute; z-index:2; left:37%; top:8%; background-color:white; padding:20px" data-aos="fade-up">



<div class="card-body">

<?php
error_reporting(0);

$type=$_GET['type'];

if($type=='new')
{
print"<div class='alert alert-success'>Register success, cek email anda untuk konfirmasi akun</div>";
}
else if($type=='gagal')
{
print"<div class='alert alert-danger'>Login gagal</div>";
}
else if($type=='sudah')
{
print"<div class='alert alert-danger'>Email sudah terdaftar</div>";
}
else if($type=='sukses')
{
print"<div class='alert alert-success'>Akun anda sudah di validasi</div>";
}

?>


<center>
<img src="user.png" style="width:200px; height:200px">
</center>

<form action="load" method="post">

<div class="form-group">
<label>Email</label>
<input type="email" name="email"  class="form-control" required>
</div>


<div class="form-group">
<label>Password</label>
<input type="password" name="pass" id="pass"  class="form-control" required>
</div>

<p align="right">
	  <label>
        <input type="checkbox" class="lihatpass" />
        <span><small>show password</small></span>
      </label>
</p>


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





</div>

<div class="card-footer">

<input type="submit" name="nama"  value="Login" class="btn btn-info" />
<a href="register" class="btn">daftar</a>
</div>

</form>

</div>


      <span style="position:absolute; top:90%; left:43%">
                <small>&copy; Diskominfo Deli Serdang 2021</small>
              </span>

<script>   
     AOS.init(); 
</script>


</body>
</html>
