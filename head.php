 <?php
 error_reporting(0);
 
 session_start();
 
 if($_SESSION['email']=='')
 {
 echo '<script>window.location="login"</script>';
 }
 
 
 ?>
 
  <meta charset="utf-8" />

  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
   Subdomain Maker
  </title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />

  <!-- CSS Files -->
  <link href="../assets/css/bootstrap.min.css" rel="stylesheet" />
  <link href="../assets/css/paper-dashboard.css?v=2.0.1" rel="stylesheet" />
  <!-- CSS Just for demo purpose, don't include it in your project -->

  
  
