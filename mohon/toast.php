<?php
session_start();
?>

<html>
  <head>

	
  </head>
  <body>
    
	
<?php



if($_SESSION['pesaninput']=='sukses')
{	
print"<div class='alert alert-success' style='position:absolute; z-index:999; margin-top:5px; left:45%'>
      <i class='nc-icon nc-send'></i> <strong>Sukses !</strong> Input data
  
</div>";
}

if($_SESSION['pesanedit']=='sukses')
{	
print"<div class='alert alert-success' style='position:absolute; z-index:999; margin-top:5px; left:45%'>
      <i class='nc-icon nc-send'></i> <strong>Sukses !</strong> Update data
  
</div>";
}

unset($_SESSION['pesaninput']);
unset($_SESSION['pesanedit']);
?>	
	
    

	
    <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
	
  </body>
</html>






<script>
window.setTimeout(function() {
    $(".alert").fadeTo(300, 0).slideUp(300, function(){
        $(this).remove(); 
    });
}, 3000);
</script>