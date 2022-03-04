
<!DOCTYPE html>
<html lang="en">

<head>
<?php include"../head.php"; ?>

<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.3.0/Chart.bundle.js"></script>

</head>

<body class="">
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
 
 
 
<?php 

include"../konek.php";

$hasil3=mysqli_query($konek,"select * from tabelmohon");
$total=mysqli_num_rows($hasil3);

$hasil=mysqli_query($konek,"select * from tabelmohon where status='valid'");
$jumlah_valid=mysqli_num_rows($hasil);

$hasil2=mysqli_query($konek,"select * from tabelmohon where status='tidak valid'");
$jumlah_invalid=mysqli_num_rows($hasil2); 


 ?> 
 
 
  <div class="content">
        <div class="row">
          <div class="col-lg-4 col-md-6 col-sm-6">
            <div class="card card-stats">
              <div class="card-body ">
                <div class="row">
                  <div class="col-5 col-md-4">
                    <div class="icon-big text-center icon-warning">
                      <i class="nc-icon nc-zoom-split text-warning"></i>
                    </div>
                  </div>
                  <div class="col-7 col-md-8">
                    <div class="numbers">
                      <p class="card-category">Jumlah</p>
                      <p class="card-title"><?php print"$total"; ?><p>
                    </div>
                  </div>
                </div>
              </div>
              <div class="card-footer ">
                <hr>
                <div class="stats">
                  <i class="fa fa-refresh"></i>
                  Total permohonan
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-4 col-md-6 col-sm-6">
            <div class="card card-stats">
              <div class="card-body ">
                <div class="row">
                  <div class="col-5 col-md-4">
                    <div class="icon-big text-center icon-warning">
                      <i class="nc-icon nc-check-2 text-success"></i>
                    </div>
                  </div>
                  <div class="col-7 col-md-8">
                    <div class="numbers">
                      <p class="card-category">Jumlah</p>
                      <p class="card-title"><?php print"$jumlah_valid"; ?><p>
                    </div>
                  </div>
                </div>
              </div>
              <div class="card-footer ">
                <hr>
                <div class="stats">
                  <i class="fa fa-calendar-o"></i>
                  Jumlah permohonan Valid
                </div>
              </div>
            </div>
          </div>
        
          <div class="col-lg-4 col-md-6 col-sm-6">
            <div class="card card-stats">
              <div class="card-body ">
                <div class="row">
                  <div class="col-5 col-md-4">
                    <div class="icon-big text-center icon-warning">
                      <i class="nc-icon nc-simple-remove text-danger"></i>
                    </div>
                  </div>
                  <div class="col-7 col-md-8">
                    <div class="numbers">
                      <p class="card-category">Jumlah</p>
                      <p class="card-title"><?php print"$jumlah_invalid"; ?><p>
                    </div>
                  </div>
                </div>
              </div>
              <div class="card-footer ">
                <hr>
                <div class="stats">
                  <i class="fa fa-refresh"></i>
                  Jumlah permohonan tidak valid
                </div>
              </div>
            </div>
          </div>
        </div>
		
		
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header " style="background-image:url('../hdhd.jpg'); background-size:cover; color:white">
                <h5 class="card-title">Analisis Perbulan</h5>
                <p class="card-category text-white">Jumlah permohonan</p>
              </div>
              <div class="card-body ">
			  
              <canvas id="myChart" width="100" height="30"></canvas>
				
				

<?php
$periode=date('M Y');
$tahun=date('Y');

$hasil4=mysqli_query($konek,"select * from tabelgraf order by id asc");

while($data=mysqli_fetch_array($hasil4))
{
$bulan[]=$data['bulan'];
$jumlah[]=$data['jumlah'];
}


?>

<script>
            var ctx = document.getElementById("myChart");
            var myChart = new Chart(ctx, {
                type: 'line',
                data: {
                    labels: <?php echo json_encode($bulan); ?>,
                    datasets: [{
                            label: 'Tahun <?php print"$tahun"; ?>',
                            data: <?php echo json_encode($jumlah); ?>,
                            backgroundColor: [
                                'rgba(54, 162, 235, 0.2)',
                                'rgba(54, 162, 235, 0.2)',
								'rgba(54, 162, 235, 0.2)',
								'rgba(54, 162, 235, 0.2)',
								'rgba(54, 162, 235, 0.2)',
								'rgba(54, 162, 235, 0.2)',
								'rgba(54, 162, 235, 0.2)',
								'rgba(54, 162, 235, 0.2)',
                                'rgba(54, 162, 235, 0.2)',
								'rgba(54, 162, 235, 0.2)',
								'rgba(54, 162, 235, 0.2)',
								'rgba(54, 162, 235, 0.2)'
								
                               
                            ],
                            borderColor: [
                                
                                'rgba(54, 162, 235, 1)',
								'rgba(54, 162, 235, 1)',
								'rgba(54, 162, 235, 1)',
								'rgba(54, 162, 235, 1)',
								'rgba(54, 162, 235, 1)',
								'rgba(54, 162, 235, 1)',
								'rgba(54, 162, 235, 1)',
								'rgba(54, 162, 235, 1)',
								'rgba(54, 162, 235, 1)',
								'rgba(54, 162, 235, 1)',
								'rgba(54, 162, 235, 1)',
								'rgba(54, 162, 235, 1)'
                                                            ],
                            borderWidth: 1
                        }]
                },
                options: {
                    scales: {
                        yAxes: [{
                                ticks: {
                                    beginAtZero: true
                                }
                            }]
                    }
                }
            });
        </script>

				
              
			  </div>
              <div class="card-footer ">
                <hr>
                <div class="stats">
                  <i class="fa fa-history"></i> Updated 3 minutes ago
                </div>
              </div>
            </div>
          </div>
        </div>
       




<!-- /modal input -->

 <div class="modal fade modal-transparent" id="modal-input">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title"><i class="fas fw-fa fa-edit"></i>Tambah data </h4>
         <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <spa
              </button>
            </div>
            <div class="modal-body">
           
		   
		   <form  method="post" action="input.php" enctype="multipart/form-data">
		   		   		   
		   
		      <div class="form-group">
		   <label>Nama subdomain</label>
		   <input type="text" name="namasub" class="form-control"  required>
		   </div>
		   
		   	      <div class="form-group">
		   <label>IP Publik</label>
		   <input type="text" name="ip" class="form-control"  required>
		   </div>
		   
	
		   	      <div class="form-group">
		   <label>Bahasa pemrograman</label>
		   <select name="bahasa" class="form-control"  required>
		   <option value="PHP">PHP</option>
		   <option value="Javascript">Javascript</option>
		   <option value="ASP">ASP</option>
		   </select>
		   </div>
	
	
		   	      <div class="form-group">
		   <label>Basis data</label>
		   <select name="basisdata" class="form-control"  required>
		   <option value="Mysql">Mysql</option>
		   <option value="MariaDB">MariaDB</option>
		   <option value="SQLite">SQLite</option>
		   </select>
		   </div>
		   
		   
		   
		   
		   	      <div class="form-group">
		   <label>Framework</label>
		   <select name="framework" class="form-control"  required>
		   <option value="Codeigniter">Codeigniter</option>
		   <option value="Laravel">Laravel</option>
		   <option value="Native">Native</option>
		   </select>
		   </div>
		   
		   
		   <div class="form-group">
		   <label>Sasaran Pengguna</label>
		   <select name="sasaran" class="form-control"  required>
		   <option value="Internal Perangkat Daerah">Internal Perangkat Daerah</option>
		   <option value="Antar Perangkat Daerah">Antar Perangkat Daerah</option>
		   <option value="Masyarakat Umum">Masyarakat Umum</option>
		   </select>
		   </div>
		   
		   
		   <div class="form-group">
		   <label>Deskripsi aplikasi</label>
		   <textarea name="deskripsi" class="form-control"  required>
		   </textarea>
		   </div>
		   
		  
		   
		   <div >
		   <label>Upload Surat permohonan</label>
		   <input type="file" name="surat" class="form-control">
		   </div>
		   
		<br>
		   
		   <div >
		   <label>Upload Source Code</label>
		   <input type="file" name="coding" class="form-control">
		   </div>
		   
		   
		   
		   
			</div>
			
            <div class="modal-footer">
<button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fas fw-fa fa-times"></i> Close</button>
              <button type="submit"  class="btn btn-primary" name="submit"><i class="fas fa-fw fa-save"></i>Simpan</button>
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