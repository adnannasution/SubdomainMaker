
 
 
  <div class="container-fluid">
          <div class="navbar-wrapper">
            <div class="navbar-toggle">
              <button type="button" class="navbar-toggler">
                <span class="navbar-toggler-bar bar1"></span>
                <span class="navbar-toggler-bar bar2"></span>
                <span class="navbar-toggler-bar bar3"></span>
              </button>
            </div>
            <a class="navbar-brand" href="javascript:;">
	
		Subdomain Maker	
			
			</a>
          
		  
		  </div>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
          </button>
		  
		  
		  
          <div class="collapse navbar-collapse justify-content-end" id="navigation">
           
		   <?php
		   if($sebagai!='')
		   {
		   ?>
		   
		    <form method="post" action="../mohon/data.php?side=mohon">
              <div class="input-group no-border">
                <input type="text" value="" name="cari" class="form-control" placeholder="Search...">
                <div class="input-group-append">
                  <div class="input-group-text">
                    <i class="nc-icon nc-zoom-split"></i>
                  </div>
                </div>
              </div>
            </form>
			
			<?php
			}
			else
			{
			$tanggalok=date('D, d M Y');
			print"$tanggalok"; 
			}
			
			?>
           
          </div>
		  
		  
		  
        </div>