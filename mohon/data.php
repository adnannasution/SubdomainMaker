
<!DOCTYPE html>
<html lang="en">

<head>
<?php include"../head.php"; ?>
</head>

<body class="">

  <?php include"toast.php"; ?>  


  <div class="wrapper ">
    <div class="sidebar" data-color="white" data-active-color="danger">
 <?php include"../sidebar.php"; ?>   
    </div>
	
	
	
	
    <div class="main-panel">
      <!-- Navbar -->
      <nav class="navbar navbar-expand-lg navbar-absolute fixed-top navbar-transparent">
   <?php include"../navbar.php"; ?>     
      </nav>
      <!-- End Navbar -->
      <div class="content">
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header" style="background-image:url('../hdhd.jpg'); background-size:cover; color:white">
                <h5 class="title">Permohonan</h5>
                <p class="category text-white">Data permohonan subdomain/hosting</p>
              </div>
              <div class="card-body">
			  




<table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
       
             
				 
				  <th>Aplikasi</th>

<?php
if($sebagai!='')
{
?>

				  <th>Instansi</th>
				  
<?php
}
?>				  
				  
				    <th>Subdomain</th>
				
				 
				  <th>Action</th>
                </tr>
                </thead>
                <tbody>
				
<?php
error_reporting(0);

include"../konek.php";

$cari=$_POST['cari'];
$sebagai=$_SESSION['sebagai'];
$email=$_SESSION['email'];


if($sebagai!='')
{

if($cari!='')
{
$tampil=mysqli_query($konek,"select * from tabelmohon join tabelpengguna on tabelmohon.email=tabelpengguna.email where namasub like '%$cari%' or aplikasi like '%$cari%'");
}
else
{
$tampil=mysqli_query($konek,"select * from tabelmohon join tabelpengguna on tabelmohon.email=tabelpengguna.email");
}

}

else
{
$tampil=mysqli_query($konek,"select * from tabelmohon join tabelpengguna on tabelmohon.email=tabelpengguna.email where tabelmohon.email='$email'");
}



while($data=mysqli_fetch_array($tampil))
{
	
?>	
 <tr>


<td><?php print"$data[aplikasi]"; ?>
<br>

<?php
if($data['status']=='valid')
{
print"<div class='badge badge-success'>$data[status]</div>";



}
else if($data['status']=='tidak valid')
{
print"<div class='badge badge-danger'>$data[status]</div>";

if($data['ket']!='')
{
print" &nbsp;<a href='#' data-toggle='modal' data-target='#ket$data[id]'><u>lihat ket.</u></a>";
}

}
else
{
print"<div class='badge badge-warning'>on check</div>";
}


if($sebagai=='' and $data['status']=='valid')
{
print"<br><u><a target='_blank' href='cetak?id=$data[id]'>cetak surat</a></u>";
}


?>

</td>

<?php 
if($sebagai!='')
{
print"<td>$data[instansi]";

if($data['status']=='valid')
{
print"<br><u><a target='_blank' href='cetak?id=$data[id]'>cetak surat</a></u>";
}

print"</td>";

}



 ?>



<td><?php 


print"$data[namasub].deliserdangkab.go.id";
if($data['framework']!='')
{
print"<br><small>subdomain+hosting</small>";
}
else
{
print"<br><small>subdomain</small>";
}


if($sebagai!='' and $data['teruskan']=='teruskan')
{
print"<div class='badge badge-primary'>checked</div>";
}
 ?></td>


<td> 

<a class='btn btn-info btn-sm' data-toggle="modal" data-target="#detail<?php print"$data[id]"; ?>">detail</a>				 

<?php


if($sebagai=='pejabat domain')
{
?>
<a class='btn btn-danger btn-sm' data-toggle="modal" data-target="#ok<?php print"$data[id]"; ?>">konfirmasi</a>
<?php
}
?>



<?php
if($sebagai=='admin server' and $data['teruskan']=='teruskan' and $data['status']!='tidak valid'  )
{
?>
<a class='btn btn-warning btn-sm' data-toggle="modal" data-target="#ip<?php print"$data[id]"; ?>">update akun VPN</a>
<?php
}
?>


</td>
</tr>
<?php



include"modal.php";



}
?>   
</tbody>
</table>
    



<?php
if($sebagai=='')
{
?>

<button type="button" class="btn btn-warning" data-toggle="modal" data-target="#modal-input" >
permohonan subdomain
</button>

<button type="button" class="btn btn-info" data-toggle="modal" data-target="#modal-input2" >
permohonan subdomain+hosting
</button>

<?php
}
?>








<!-- /modal input -->

 <div class="modal fade modal-transparent" id="modal-input">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title"><i class="fas fw-fa fa-edit"></i>Permohonan Sudomain</h4>
         <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <spa
              </button>
            </div>
            <div class="modal-body">
           
		   
		   <form  method="post" action="inputs.php" enctype="multipart/form-data">
		   		   		   
	
		      <div class="form-group">
		   <label>Nama Aplikasi</label>
		   <input type="text" name="aplikasi" class="form-control"  required>
		   </div>
		   
		   	   	      <div class="form-group">
		   <label>IP Publik</label>
		   <input type="text" name="ip" class="form-control"  required>
		   </div>
		   
		      <div class="form-group">
		   <label>Nama subdomain</label>
		   <input type="text" name="namasub" id="namasub" onKeyUp="pesan()"  class="form-control"  required>
		
		   </div>
		   
 <div id="muncul" class="text-right"></div>

<script type="text/javascript">
	
	function pesan(){
	var namasubok = document.getElementById("namasub").value;
		
if (namasubok.indexOf(' ') > -1)
{
document.getElementById("muncul").innerHTML = "<div class='alert alert-danger'>tidak boleh pakai spasi</div>";
document.getElementById("kirim").disabled = true;
}
else
{
document.getElementById("muncul").innerHTML = "<div class='alert alert-success'>"+namasubok+".deliserdangkab.go.id</div>";
document.getElementById("kirim").disabled = false;
}
	
	
	}
		
	
</script>
		   
	
		   	      <div class="form-group">
		   <label>Bahasa pemrograman</label>
		   <select name="bahasa" class="form-control"  required>
		   <option value="">pilih</option>
		   <option value="PHP">PHP</option>
		   <option value="Javascript">Javascript</option>
		   <option value="Phyton">Phyton</option>
		   <option value="Java">Java</option>
		   <option value="C++">C++</option>
		   <option value="Lainnya">Lainnya</option>
		   </select>
		   </div>
	
	
		   	      <div class="form-group">
		   <label>Basis data</label>
		   <select name="basisdata" class="form-control"  required>
		    <option value="">pilih</option>
		   <option value="Mysql">Mysql</option>
		   <option value="MariaDB">MariaDB</option>
		   <option value="MongoDB">MongoDB</option>
		   <option value="Oracle">Oracle</option>
		   <option value="SQLite">SQLite</option>
		   <option value="Lainnya">Lainnya</option>
		   </select>
		   </div>
		   
		   
		   
  
		   
		   <div class="form-group">
		   <label>Deskripsi aplikasi</label>
		   <textarea name="deskripsi" class="form-control"  required>
		   </textarea>
		   </div>
		   
		  
		   
		   <div >
		   <label>Upload Surat permohonan</label>
		   <input type="file" name="surat" class="form-control" required>
		     <label> <small>*.pdf, *.jpg, *.png</small></label>
		   </div>
		   
		   
		   	      <div class="form-group">
		   <label>No surat</label>
		   <input type="text" name="nosurat" class="form-control"  required>
		   </div>
		   
		   
		   
		   
		   
			</div>
			
            <div class="modal-footer">
<button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fas fw-fa fa-times"></i> Close</button>
              <button type="submit" id="kirim"  class="btn btn-primary" name="submit"><i class="fas fa-fw fa-save"></i>Simpan</button>
			  </form>







            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->
	  
 










<!-- /modal input -->

 <div class="modal fade modal-transparent" id="modal-input2">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title"><i class="fas fw-fa fa-edit"></i>Permohonan Sudomain+Hosting</h4>
         <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <spa
              </button>
            </div>
            <div class="modal-body">
           
		   
		   <form  method="post" action="input.php" enctype="multipart/form-data">
		   		   		   
		   		      <div class="form-group">
		   <label>Nama Aplikasi</label>
		   <input type="text" name="aplikasi" class="form-control"  required>
		   </div>
		   
		   
		   
		      <div class="form-group">
		   <label>Nama subdomain</label>
		   <input type="text" name="namasub" id="namasub2" class="form-control" onKeyUp="pesan2()"  required>
		   </div>
		   
	
 <div id="muncul2" class="text-right"></div>

<script type="text/javascript">
	
	function pesan2(){
	var namasubok2 = document.getElementById("namasub2").value;
		
if (namasubok2.indexOf(' ') > -1)
{
document.getElementById("muncul2").innerHTML = "<div class='alert alert-danger'>tidak boleh pakai spasi</div>";
document.getElementById("kirim2").disabled = true;
}
else
{
document.getElementById("muncul2").innerHTML = "<div class='alert alert-success'>"+namasubok2+".deliserdangkab.go.id</div>";
document.getElementById("kirim2").disabled = false;
}
	
	
	}
		
	
</script>
		   
	
		   	      <div class="form-group">
		   <label>Bahasa pemrograman</label>
		   <select name="bahasa" class="form-control"  required>
		   <option value="">pilih</option>
		   <option value="PHP">PHP</option>
		   <option value="Javascript">Javascript</option>
		   <option value="Phyton">Phyton</option>
		   <option value="Java">Java</option>
		   <option value="C++">C++</option>
		   <option value="Lainnya">Lainnya</option>
		   </select>
		   </div>
	
	
		   	      <div class="form-group">
		   <label>Basis data</label>
		   <select name="basisdata" class="form-control"  required>
		    <option value="">pilih</option>
		   <option value="Mysql">Mysql</option>
		   <option value="MariaDB">MariaDB</option>
		   <option value="MongoDB">MongoDB</option>
		   <option value="Oracle">Oracle</option>
		   <option value="SQLite">SQLite</option>
		   <option value="Lainnya">Lainnya</option>
		   </select>
		   </div>
		   
		   
		   
		   
		   	      <div class="form-group">
		   <label>Framework</label>
		   <select name="framework" class="form-control"  required>
		   <option value="">pilih</option>
		   <option value="Codeigniter">Codeigniter</option>
		   <option value="Laravel">Laravel</option>
		   <option value="Shimpony">Shimpony</option>
		   <option value="Yii">Yii</option>
		   <option value="Native">Native</option>
		   </select>
		   </div>
		   
		   
		   <div class="form-group">
		   <label>Sasaran Pengguna</label>
		   <select name="sasaran" class="form-control"  required>
		   <option value="Internal Perangkat Daerah">Internal Perangkat Daerah</option>
		   <option value="Antar Perangkat Daerah">Antar Perangkat Daerah</option>
		   <option value="Masyarakat Umum">Masyarakat Umum</option>
		   <option value="Lainnya">Lainnya</option>
		   </select>
		   </div>
		   
		   
		   <div class="form-group">
		   <label>Deskripsi aplikasi</label>
		   <textarea name="deskripsi" class="form-control"  required>
		   </textarea>
		   </div>
		   
		  
		   
		   <div >
		   <label>Upload Surat permohonan</label>
		   <input type="file" name="surat" class="form-control" required>
		  <label> <small>*.pdf, *.jpg, *.png</small></label>
		   </div>
		   
		   
		   <div class="form-group">
		   <label>No surat</label>
		   <input type="text" name="nosurat" class="form-control"  required>
		   </div>
		   
		   
		   
		<br>
		   
		   <div >
		   <label>Upload Source Code</label>
		   <input type="file" name="coding" class="form-control" required>
		    <label> <small>*.zip, *.rar</small></label>
		   </div>
		   
		   
		   
		   
			</div>
			
            <div class="modal-footer">
<button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fas fw-fa fa-times"></i> Close</button>
              <button type="submit" id="kirim2"  class="btn btn-primary" name="submit"><i class="fas fa-fw fa-save"></i>Simpan</button>
			  </form>







            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->
	  
 
 
			  
			  
			  
     
              </div>
            </div>
          </div>
        </div>
      </div>
      <footer class="footer footer-black  footer-white ">
        <?php include"../footer.php"; ?>  
      </footer>
	  
	  
	  
    </div>
  </div>


      


  <!--   Core JS Files   -->
  <?php include"../java.php"; ?> 
  
  
	
  
</body>

</html>