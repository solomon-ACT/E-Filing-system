 <?php
function rands($len){
     
     $fr=str_shuffle("0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ");
     $max = strlen($fr)-1;
     $rands = "";
     $lengeth2 = $len;
     $rands="";
     for($i=0; $i<$lengeth2; $i++){
        $rands .= $fr[mt_rand(0,$max)];
        }

     return $rands;
     }
?>
 <?php
$UserId=rands(8);
session_start();
if(!isset($_SESSION['Id'])){
   header('Location: home.php');
}
     require_once("header_admin.php");

     include "connection.php";
  if(isset($_POST['submit']))
  {
    $fname=$_POST['Fname'];
    $lname=$_POST['Lname'];
    $username=$_POST['Username'];
    $password=$_POST['Password'];
    $role=$_POST['role'];
    $status="Active";
    $date_added= date("Y-m-d");
    $action="User Added";
    $adm_id=$_SESSION['Id'];
    $date_m='0000-00-00';
    $sal_no="Null";
    $dr_no="Null";
    $sal_no="Null";
    
   
    $img=$_FILES['photo']['name'];
    $tmp_name=$_FILES['photo']['tmp_name'];
    $location='Image/' .$img;
    
    $insert="insert into account values('$UserId','$fname','$lname','$username','$password','$role','$img','$status')";
    $result=mysqli_query($conn,"INSERT INTO tb_adminhistory(`id`,`admin_id`,`saleda_no`,`driver_no`,`user_id`,`date_added`,`date_modified`,`action_type`) VALUES(NULL,'$adm_id',' $sal_no','$dr_no','$UserId','$date_added','$date_m','$action')");
    
    

    if(mysqli_query($conn,$insert) && $result) 
    {
      move_uploaded_file($tmp_name,$location);
      
      
    }
    else
    {
      echo "<script>alert('User has not been uploaded ')</script>";
    }
 }
   ?>
   <section class="content">
     <div class="col-md-12">
     <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">ተጠቃሚ ማስገብያ ቀጽ</h3>
            </div>
          <div class="box-body">
          
           <form role="form" method="POST" action="adduser.php" enctype="multipart/form-data">
                <div class="col-md-6">
                  <div class="form-group">
                  
                  <label>Id</label>
                  <input type="text" name="UserId" value="<?php echo "ID: ",$UserId; ?>" disabled="" required/>
               </div>
                  
                <div class="form-group">
                	
                  <label>የመጀመረያ ስም</label>
                  <input type="text" name="Fname" class="form-control" placeholder="የመጀመረያ ስሙን አስገባ">
               </div>
               
                <div class="form-group">
              
                  <label for="exampleInputEmail1">የአባት ስም</label>
                  <input type="text" name="Lname" class="form-control" id="exampleInputEmail1" placeholder="የአባት ስም አስገባ">
               
            </div>
            <div class="form-group">
                
                  <label for="exampleInputEmail1">ዩዘር ስም</label>
                  <input type="text" name="Username" class="form-control" id="exampleInputEmail1" placeholder="ዩዘር ስም">
                
            </div>
                
            <div class="form-group">
               
                  <label for="exampleInputPassword1">ይለፍ ቃል</label>
                  <input type="password" name="Password" class="form-control" id="exampleInputPassword1" placeholder="ይለፍ ቃል አስገባ">
              
            </div>
              <div class="form-group">
               
                 	<label>ሮል</label>
                    <select name="role" width="5">
                  	   <option>role ምረጥ</option>
                  	   <option>Admin</option>
                  	   <option>Manager</option>
                  	   <option>User_vehicle</option>
                       <option>User_driver</option>
                       <option>Audit_Driver</option>
                       <option>Audit_Vehicle</option>
                       <option>Technician</option>
                       <option>Vehicle_Leader</option>
                       <option>Auditor_Leader</option>
                       <option>Efile</option>
                       <option>Driver_Leader</option>
                    </select>
                </div>
            <div class="form-group">
               
                    <label>ፎቶ: </label>
                    <input type="file" name="photo">
                </div>
        
              
              <div class="form-group">
              
                <input type="submit" name="submit" class="btn btn-primary" value="አስቀሚጥ">
              </div></div>
            </form>
        
          </div>
        </div></section>

  <?php

     require_once("footer.php");

?>          
