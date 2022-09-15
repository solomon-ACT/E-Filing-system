<?php
  session_start();
 include "connection.php";
  if(isset($_GET['id']))
  {

  $id=$_GET['id'];
  $status="InActive";
   $date=date("Y-m-d");
   $adm_id=$_SESSION['Id'];
   $action="Remove User";

    $date_a='0000-00-00';
    $dr_no="Null";
   
    $sal_no="Null";

    $result=mysqli_query($conn,"UPDATE `vedriver`.`account` SET `status` = '$status' WHERE `account`.`id` = '$id'");
    
    $insert=mysqli_query($conn,"INSERT INTO tb_adminhistory(`id`,`admin_id`,`saleda_no`,`driver_no`,`user_id`,`date_added`,`date_modified`,`action_type`) VALUES(NULL,'$adm_id','$sal_no','$dr_no','$id','$date_a','$date','$action')");

  if($result && $insert)
  {   
        
      header('Location: userlist.php');
  }
 
  }
 
?>
