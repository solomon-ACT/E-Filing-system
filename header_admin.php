<html style="height: auto; min-height: 100%">
<head>
   <meta charset="utf-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <link rel="icon" href="Logo/logo1214d.ico" type="image/x-icon" />
   <link rel="shortcut icon" href="Logo/logo1214d.ico" type="image/x-icon" />
   <title>ፋይል አስተዳደር ሲስተም</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css" type="text/css"/>
  <!-- Font Awesome -->
  <link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.min.css" type="text/css"/>
  <!-- Ionicons -->
  <link rel="stylesheet" href="bower_components/Ionicons/css/ionicons.min.css" type="text/css"/>
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css"type="text/css"/>
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css" type="text/css"/>
  <!-- Morris chart -->
  <link rel="stylesheet" href="bower_components/morris.js/morris.css" type="text/css"/>
  <!-- jvectormap -->
  <link rel="stylesheet" href="bower_components/jvectormap/jquery-jvectormap.css" type="text/css"/>
  <!-- Date Picker -->
  <link rel="stylesheet" href="bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css"type="text/css"/>
  <!-- Daterange picker -->
  <link rel="stylesheet" href="bower_components/bootstrap-daterangepicker/daterangepicker.css" type="text/css"/>
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css" type="text/css"/>
  <link rel="stylesheet" href="bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
 

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
<style type="text/css">.jqstooltip { position: absolute;left: 0px;top: 0px;visibility: hidden;background: rgb(0, 0, 0) transparent;background-color: rgba(0,0,0,0.6);filter:progid:DXImageTransform.Microsoft.gradient(startColorstr=#99000000, endColorstr=#99000000);-ms-filter: "progid:DXImageTransform.Microsoft.gradient(startColorstr=#99000000, endColorstr=#99000000)";color: white;font: 10px arial, san serif;text-align: left;white-space: nowrap;padding: 5px;border: 1px solid white;box-sizing: content-box;z-index: 10000;}.jqsfield { color: white;font: 10px arial, san serif;text-align: left;}</style>
</head>
<?php
include "connection.php";
$id=$_SESSION['Id'];
$sql = "SELECT * FROM account WHERE id='$id'";

  $result= $conn->query($sql);
  $row = $result->fetch_assoc();


?>
<body class="skin-blue sidebar-mini" style="height: ; min-height: 100%;">
<div class="wrapper" style="height: ; min-height: 100%;">
<header class="main-header">
    <!-- Logo -->
    <a href="#" class="logo">
      <span class="logo-mini"><b>A</b>dmin</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Administrator</b></span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      
          <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
            <span class="sr-only">Toggle navigation</span>
          </a>
          
          
           <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
          <li>
            <a href="logout.php">ውጣ</a>
          </li>
           </ul>
          </div>
             <p style="text-align: center;"><img src="#" style="width: 80%;height: 40px; padding-top: 10px; padding-bottom: 0px;" alt='Place Your Logo Heer'></p>
          
    </nav>
  </header>
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar" style="height: auto;">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="Image/<?php echo $row['photo'] ?>" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?php echo $row['FName'] ?> <?php echo $row['LName'] ?></p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <ul class="sidebar-menu tree" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>
        <li><a href="index_admin.php"><i class="fa  fa-dashboard (alias)"></i><span>Admin Profile</span></a></li>
        <li><a href="adduser.php"><i class="fa fa-user-plus"></i><span> የተጠቃሚ ማስገቢያ</span></a></li>
        <li><a href="userlist.php"><i class="fa fa-list"></i> <span> የተጠቃሚ ዝርዝር</span></a></li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-folder-open"></i>
            <span>የፋይል ማስገቢያ</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu" style="display: none;">
      <li><a href="addvehicle.php"><i class="fa  fa-registered"></i> <span>Vehicle Single file Add</span></a></li>
       <li><a href="admin_vehiclebatchadd.php"><i class="fa  fa-registered"></i> <span>Vehicle Batch Add</span></a></li>   
          </ul>
        </li>  

        <li><a href="vehiclelist_admin.php"><i class="fa fa-file"></i> <span>የተሽከርካሪ መረጃ ዝርዝር</span></a></li>
        
        <li><a href="changepassadmin.php"><i class="fa  fa-lock"></i> <span>Change Password</span></a></li>
      </ul>
    </section>
  </aside>
  <div class="content-wrapper" style="min-height: 916px;">
    <section class="content-header">
      <h1>
        Dashboard
       
      </h1>
    </section>
    <script src="bower_components/jquery/dist/jquery.min.js"></script>
    <script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="bower_components/fastclick/lib/fastclick.js"></script>
    <script src="dist/js/adminlte.min.js"></script>
    <script src="bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
    <script src="plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
    <script src="plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
    <script src="bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
    <script src="bower_components/chart.js/Chart.js"></script>
    <script src="dist/js/demo.js"></script>        