<!-- Modal -->
<div class="modal fade" id="ip<?php print"$data[id]"; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Kirim Akun VPN/VPS</h5>
  
      </div>
      <div class="modal-body">
	  
<form method="post" action="inputvpn.php">



		<input type="hidden" name="id" value="<?php print"$data[id]"; ?>" class="form-control" readonly>


		<div class="form-group mt-1">
		<label>IP dan Akun VPN/VPS</label>
		<textarea name="kethasil" class="form-control"></textarea>
		</div>
		

		
      </div>
      <div class="modal-footer">
        
    
	<input type="submit" name="submit" value="kirim" class="btn btn-success">
	
	
</form>		
      </div>
    </div>
  </div>
</div>







<!-- Modal -->
<div class="modal fade" id="hapus<?php print"$data[id]"; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Konfirmasi</h5>
       
      </div>
      <div class="modal-body">
        
Apakah anda yakin permohonan ini dibatalkan ?
		
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">close</button>
    
	
	<a href="hapus.php?id=<?php print"$data[id]"; ?>" class="btn btn-primary">hapus</a>
	
	
      </div>
    </div>
  </div>
</div>
  
  
  
  

<!-- Modal -->
<div class="modal fade" id="ket<?php print"$data[id]"; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Keterangan</h5>
       
      </div>
      <div class="modal-body">
        
<?php print"$data[ket]"; ?>
		
      </div>
      <div class="modal-footer">

	
	
      </div>
    </div>
  </div>
</div>
    




<!-- Modal -->
<div class="modal fade" id="ok<?php print"$data[id]"; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Konfirmasi</h5>
  
      </div>
      <div class="modal-body">
	  
<form method="post" action="konfirmasi.php">



		<input type="hidden" name="id" value="<?php print"$data[id]"; ?>" class="form-control" readonly>


		<div class="form-group mt-1">
		<label>Status</label>
		<select name="status" id="status<?php print"$data[id]"; ?>" class="form-control" onChange="tampilkan<?php print"$data[id]"; ?>()">
		<option value="">pilih</option>
		<option value="teruskan">Teruskan ke Admin Server</option>
		<option value="selesai">Selesai</option>
		<option value="tidak valid">Tidak valid</option>
		</select>
		</div>
		
		
		
		
		<div class="form-group mt-1" id="bagianku<?php print"$data[id]"; ?>">
		<label>Keterangan</label>
		<textarea name="ket" class="form-control"></textarea>
		</div>
		
	
		<div class="form-group mt-1" id="suratmu<?php print"$data[id]"; ?>">
		<label>No Surat</label>
		<input type="text" name="nosurat"  class="form-control">
		</div>
		
		
<script type="text/javascript">
document.getElementById('bagianku<?php print"$data[id]"; ?>').style.display='none'
document.getElementById('suratmu<?php print"$data[id]"; ?>').style.display='none'

   function tampilkan<?php print"$data[id]"; ?>() {
	var isi = document.getElementById("status<?php print"$data[id]"; ?>").value;
        
		
		
		if(isi == 'tidak valid')
		{
		document.getElementById('bagianku<?php print"$data[id]"; ?>').style.display=''
		document.getElementById('suratmu<?php print"$data[id]"; ?>').style.display='none'
		}
		else if(isi == 'teruskan')
		{
		document.getElementById('bagianku<?php print"$data[id]"; ?>').style.display='none'
			document.getElementById('suratmu<?php print"$data[id]"; ?>').style.display='none'
		}
		else if(isi == 'valid')
		{
		document.getElementById('bagianku<?php print"$data[id]"; ?>').style.display='none'
			document.getElementById('suratmu<?php print"$data[id]"; ?>').style.display=''
		}
		else
		{
		document.getElementById('bagianku<?php print"$data[id]"; ?>').style.display='none'
		document.getElementById('suratmu<?php print"$data[id]"; ?>').style.display='none'
		}
		

		
		

	
		
}
</script>		  
        

		
      </div>
      <div class="modal-footer">
        
    
	<input type="submit" name="submit" value="kirim" class="btn btn-success">
	
	
</form>		
      </div>
    </div>
  </div>
</div>











<!-- Modal -->
<div class="modal fade" id="detail<?php print"$data[id]"; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Detail permohonan</h5>
  
      </div>
      <div class="modal-body print">
	  
	  
		<div class="form-group mt-1">
		<label>Tanggal</label>
		<input type="text" name="kode" value="<?php print"$data[tanggal]"; ?>" class="form-control" style="border:0px; border-bottom:1px gray solid; background-color:white" readonly>
		</div>
		
			  
        
	<div class="form-group mt-1">
		<label>Nama pemohon</label>
		<input type="text" name="kode" value="<?php print"$data[nama]"; ?>" class="form-control" style="border:0px; border-bottom:1px gray solid; background-color:white" readonly>
		</div>	
		
	
		<div class="form-group mt-1">
		<label>HP/WA</label>
		<input type="text" name="kode" value="<?php print"$data[hp]"; ?>" class="form-control" style="border:0px; border-bottom:1px gray solid; background-color:white" readonly>
		</div>		
		

				<div class="form-group mt-1">
		<label>No surat</label>
		<input type="text" name="kode" value="<?php print"$data[nosurat]"; ?>" class="form-control" style="border:0px; border-bottom:1px gray solid; background-color:white" readonly>
		</div>





<?php
if($data['ip']!='' and $data['teruskan']!='' or $data['ip']!='' and $sebagai=='' or $data['ip']!='' and $sebagai=='pejabat domain')  
{
?>

		<div class="form-group mt-1">
		<label>IP Publik</label>
		<input type="text" name="kode" value="<?php print"$data[ip]"; ?>" class="form-control" style="border:0px; border-bottom:1px gray solid; background-color:white" readonly>
		</div>

<?php
}
?>


				<div class="form-group mt-1">
		<label>Nama Aplikasi</label>
		<input type="text" name="kode" value="<?php print"$data[aplikasi]"; ?>" class="form-control" style="border:0px; border-bottom:1px gray solid; background-color:white" readonly>
		</div>

		
				<div class="form-group mt-1">
		<label>Subdomain</label>
		<input type="text" name="kode" value="<?php print"$data[namasub].deliserdangkab.go.id"; ?>" class="form-control" style="border:0px; border-bottom:1px gray solid; background-color:white" readonly>
		</div>
		
		
				<div class="form-group mt-1">
		<label>Bahasa pemrograman</label>
		<input type="text" name="kode" value="<?php print"$data[bahasa]"; ?>" class="form-control" style="border:0px; border-bottom:1px gray solid; background-color:white" readonly>
		</div>
		
		
				<div class="form-group mt-1">
		<label>Database</label>
		<input type="text" name="kode" value="<?php print"$data[basisdata]"; ?>" class="form-control" style="border:0px; border-bottom:1px gray solid; background-color:white" readonly>
		</div>
	
	
<?php
if($data['framework']!='')
{
?>	
		
				<div class="form-group mt-1">
		<label>Framework</label>
		<input type="text" name="kode" value="<?php print"$data[framework]"; ?>" class="form-control" style="border:0px; border-bottom:1px gray solid; background-color:white" readonly>
		</div>
		
		
				<div class="form-group mt-1">
		<label>Sasaran</label>
		<input type="text" name="kode" value="<?php print"$data[sasaran]"; ?>" class="form-control" style="border:0px; border-bottom:1px gray solid; background-color:white" readonly>
		</div>
		

<?php
}
?>

	
		
		

<div class="form-group mt-1">
		<label>Deskripsi</label>
		<textarea style="border:0px; border-bottom:1px gray solid; background-color:white" readonly class="form-control">
<?php print"$data[deskripsi]"; ?>
</textarea>	
</div>


<div class="form-group mt-1">
<div class="">
<?php print"$data[kethasil]"; ?>
</div>
</div>

		

      <div class="modal-footer">
<?php 
if($data['coding']!='' and $data['teruskan']!='') {

print"<a class='btn btn-success' target='_blank' href='gambar/$data[coding]'>download source code</a>"; 
}
?>


<?php print"<a class='btn btn-info' target='_blank' href='gambar/$data[surat]'>download surat</a>"; ?>
      </div>
    </div>
  </div>
</div>
  
  

	
	
