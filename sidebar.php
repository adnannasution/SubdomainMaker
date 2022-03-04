<?php

session_start();


$email=$_SESSION['email'];
$sebagai=$_SESSION['sebagai'];

include"../konek.php";

$tampilok=mysqli_query($konek,"select * from tabelpengguna where email='$_SESSION[email]'");
$data=mysqli_fetch_array($tampilok);

error_reporting(0);
?> 

  <div class="logo" style="background-image:url('../hdhd.jpg'); background-size:cover; color:white">
        <a href="https://www.creative-tim.com" class="simple-text logo-mini">
          <div class="logo-image-small">
            <img src="../coba2.png">
          </div>
          <!-- <p>CT</p> -->
        </a>
        <a href="#" class="simple-text logo-normal" style="color:white">
         <?php print"$_SESSION[nama]"; ?>
          <!-- <div class="logo-image-big">
            <img src="../assets/img/logo-big.png">
          </div> -->
        </a>
      </div>
      <div class="sidebar-wrapper">
        <ul class="nav">
		
		<?php
		$side=$_GET['side'];
		?>
		



<?php
if($_SESSION['sebagai']=='admin server' or $_SESSION['sebagai']=='pejabat domain')
{
?>			
		
          <li <?php if($side=='home') { print"class='active'"; } ?> >
            <a href="../home/data?side=home">
              <i class="nc-icon nc-bank"></i>
              <p>Dashboard</p>
            </a>
          </li>
	
<?php
}
?>
	
		  

<?php
if($_SESSION['sebagai']=='admin server' or $_SESSION['sebagai']=='pejabat domain')
{
?>		  
		  
          <li <?php if($side=='pengguna') { print"class='active'"; } ?>>
            <a href="../pengguna/data?side=pengguna" >
              <i class="nc-icon nc-circle-10"></i>
              <p>Data pengguna</p>
            </a>
          </li>
		  
<?php
}
?>		  

		  
		  
		  
          <li <?php if($side=='mohon') { print"class='active'"; } ?> >
            <a href="../mohon/data?side=mohon">
              <i class="nc-icon nc-send"></i>
              <p>Data Permohonan</p>
            </a>
          </li>
		  
		         <li <?php if($side=='profil') { print"class='active'"; } ?> >
            <a href="../profil/data?side=profil">
              <i class="nc-icon nc-single-02"></i>
              <p>Profile</p>
            </a>
          </li>




<?php
if($_SESSION['sebagai']=='admin server' or $_SESSION['sebagai']=='pejabat domain')
{
?>	
		 		         <li>
            <a href="#" data-toggle="modal" data-target="#modal-ganti" data-backdrop="false">
              <i class="nc-icon nc-key-25"></i>
              <p>Ganti Password</p>
            </a>
          </li>

<?php
}
?>
         
		 
		 		         <li>
            <a  href="#" data-toggle="modal" data-target="#modal-keluar" data-backdrop="false">
              <i class="nc-icon nc-lock-circle-open"></i>
              <p>Logout</p>
            </a>
          </li>
         
        </ul>
      </div>
	  
	  
	  
	  
	  
	  
	  
	  
	  
	  <!-- /modal input -->

 <div class="modal fade" id="modal-ganti">
        <div class="modal-dialog shadow-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title"><i class="fas fw-fa fa-edit"></i>Ganti password</h4>
         <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <spa
              </button>
            </div>
            <div class="modal-body">
           
		   
		   <form  method="post" action="ganti.php" >
		   		   		   
	
		      <div class="form-group">
		   <label>Password lama</label>
		   <input type="text" name="passlama" value="<?php print"$data[passok]"; ?>" class="form-control" readonly>
		   </div>
		   
		   <div class="form-group">
		   <label>Password baru</label>
		   <input type="text" name="passbaru"  class="form-control"  required>
		   </div>  
		   
			</div>
			
            <div class="modal-footer">
<button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fas fw-fa fa-times"></i> Close</button>
              <button type="submit"  class="btn btn-primary" name="submit"><i class="fas fa-fw fa-save"></i>Update</button>
			  </form>







            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->
	  
 



 <!-- /modal input -->

 <div class="modal fade" id="modal-keluar">
        <div class="modal-dialog shadow-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title"><i class="fas fw-fa fa-edit"></i>Konfirmasi</h4>
         <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <spa
              </button>
            </div>
            <div class="modal-body">
           
		   
	Anda yakin ingin keluar ?	   


            </div>
			
			 <div class="modal-footer">
<button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fas fw-fa fa-times"></i> Close</button>

			<a class='btn btn-warning' href="../logout.php">logout</a>
			
			          

			
			</div>
			
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->
	  	  
	  