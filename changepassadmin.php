<?php

 session_start();
if(!isset($_SESSION['Id'])){
   header('Location: home.php');
}
$er="";
     require_once("header_admin.php");
     include "connection.php";
if(isset($_POST['submit']))
{
 

  $id = $_SESSION['Id'];
  $opass = $_POST['OldPassword'];
  $npass = $_POST['NewPassword'];
  $rpass = $_POST['RePassword'];
  $sql1 = "SELECT * FROM account WHERE id='$id'";

  $result1= $conn->query($sql1);
  $row1 = $result1->fetch_assoc();
  
   
   if($opass == $row1['password'])
   {
	     $sql2 = "UPDATE `account` SET `password`= '$npass' WHERE `id`= '$id'";
		
      if($npass == $rpass)
      {

         if($conn->query($sql2))
           {
            $er = "Password succefully <b><font color='green'>Changed</font></b></font>";
           }
           else
           {
             $er = "There is <b><font color='red'>problem</font></b> on update";
            }
       }
       else
         {
          $er = "New<b><font color='red'> password did not mach</font></b> please try again";
         }
   }
   else
   {
        $er = "Wrong <b><font color='red'>Old Password</font></b> please try again";
   }
}
  

?>


   
    <section class="content">
      <div class="col-md-12">
        
<div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Password Change Form</h3>
            </div>
          <div class="box-body">
           <div class="col-md-4">
<form action="#" method="post">
      <div class="form-group has-feedback">
        <input type="password" name="OldPassword"  class="form-control" placeholder="Old Password" required />
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" name="NewPassword" class="form-control" placeholder="New Password" required>
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" name="RePassword" class="form-control" placeholder="Retype password" required>
        <span class="glyphicon glyphicon-log-in form-control-feedback"></span>
      </div>
      
      <font color="#006699"><?php echo $er; ?></font>
  
      
        <div class="col-xs-8">
          
        </div>
   
        <div class="col-xs-4">
          <input type="submit" class="btn btn-primary btn-block btn-flat" name="submit" value="Register">
        </div>
       
      
      </form>
    </div></div></div></div></section>
  
      
  <?php

     require_once("footer.php");

?>          
