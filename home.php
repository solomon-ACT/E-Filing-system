<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <link rel="icon" href="Logo/logo1214d.ico" type="image/x-icon" />
  <link rel="shortcut icon" href="Logo/logo1214d.ico" type="image/x-icon" />
  <title>ፋይል አስተዳደር ሲስተም</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="plugins/iCheck/square/blue.css">
  
  <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>


<body class="skin-blue layout-top-nav" style="height: ; min-height: 100%;">
<div class="wrapper" style="height: ; min-height: 100%;">

<div class="wrapper" style="height: ; min-height: 100%;">

  <header class="main-header">
    <nav class="navbar navbar-static-top">
      
          <p style="text-align: center;"><img src="#" style="width: 80%;height: 40px; padding-top: 10px; padding-bottom: 0px;" alt='Place Your Logo Here'></p>
      
    </nav>
  </header>
  
<div class="content-wrapper" style="min-height: 556px;">
  <div class="container">

        
<div class="login-box">
  <div class="login-logo">
   
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg">Login to start your session</p>

    <form action="home.php" method="POST">
      <div class="form-group has-feedback">
        <input type="text" name="username" class="form-control" placeholder="Username">
      
      </div>
      <div class="form-group has-feedback">
        <input type="password" name="password" class="form-control" placeholder="Password">
        
      </div>
      <div class="row">
        <div class="col-xs-8">
          
        </div>
        <div class="col-xs-4">
          <input type="submit" name="submit" value="Login" class="btn btn-info btn-flat">
        </div>
      </div>
    </form>
  </div>
</div>
    </div>
  </div>
 </div>
 </div>
<?php
session_start();
  include "connection.php";
  $sql = 'SELECT * FROM account';
  $result = $conn->query($sql);

  if(isset($_POST['submit'])){

    if(!empty($_POST['username']) && !empty($_POST['password'])) {
           
      while($row = $result->fetch_assoc()){
           
           
        if($_POST['username']== $row['Username'] && $_POST['password']== $row['password']){
            if ($row['status']!="Active") 
            {
                header('Location: errorpage.php');
            }  
            else
            {
             if($row['roles']=='Admin'){
              $_SESSION['Id']=$row['id'];
             
                header('Location: index_admin.php');    
             }
              elseif ($row['roles']=='User_vehicle')  {
              $_SESSION['Id']=$row['id'];
                header('Location: index_vehicle.php');  
             } 
              elseif ($row['roles']=='User_driver')  {
              $_SESSION['Id']=$row['id'];
                header('Location: index_driver.php');  
             }
              elseif ($row['roles']=='Audit_Driver')
              {
             
              $_SESSION['Id']=$row['id'];
              header('Location: index_auditord.php');  
              } 
              elseif ($row['roles']=='Audit_Vehicle') 
              {
             
              $_SESSION['Id']=$row['id'];
              header('Location: index_auditorv.php');  
              } 
               elseif ($row['roles']=='Manager') 
              {
             
              $_SESSION['Id']=$row['id'];
              header('Location: index_manager.php');  
              } 
              elseif ($row['roles']=='Technician') 
              {
              $_SESSION['Id']=$row['id'];
              header('Location: index_technician.php');  
              } 
              elseif ($row['roles']=='Vehicle_Leader') 
              {
              $_SESSION['Id']=$row['id'];
              header('Location: index_vehicleleader.php');  
              } 
              elseif ($row['roles']=='Auditor_Leader') 
              {
              $_SESSION['Id']=$row['id'];
              header('Location: index_auditorleader.php');  
              } 
              elseif ($row['roles']=='Efile') 
              {
              $_SESSION['Id']=$row['id'];
              header('Location: index_efile.php');  
              } 
              elseif ($row['roles']=='Driver_Leader') 
              {
              $_SESSION['Id']=$row['id'];
              header('Location: index_driverleader.php');  
              } 
             
             else
             {
              echo "please you are not authorized to this service";
             }
             }
           }
         
        }
        
    }}

require_once("footer.php");
?>
<script src="bower_components/jquery/dist/jquery.min.js"></script>

<script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

</body>
</html>